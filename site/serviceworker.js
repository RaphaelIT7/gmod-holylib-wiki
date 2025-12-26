self.addEventListener('install', event => {
	self.skipWaiting();
});

self.addEventListener('activate', event => {
	event.waitUntil(clients.claim());

	(async () => {
		try {
			const cache = await caches.open('wiki');
			const response = await fetch('/cache');
			if (response.ok)
				await cache.put('/cache', response.clone());
		} catch (err) {
			console.error('Error caching /cache page in background:', err);
		}
	})();

	(async () => {
		try {
			const cache = await caches.open('wiki');
			let oldETag = null;
			const stored = await cache.match('__etag');
			if (stored)
				oldETag = await stored.text();

			const response = await fetch('/', {
				method: 'HEAD',
				cache: 'no-store'
			});

			if (response.ok)
			{
				newETag = response.headers.get('ETag');
				if (oldETag && newETag && oldETag !== newETag)
				{
					console.log('Wiki updated, nuking cache');

					const keys = await caches.keys();
					await Promise.all(keys.map(k => caches.delete(k)));

					const dbs = await indexedDB.databases();
					await Promise.all(
						dbs.map(db => new Promise(resolve => {
							const req = indexedDB.deleteDatabase(db.name);
							req.onsuccess = req.onerror = req.onblocked = () => resolve();
						}))
					);
				}

				if (newETag)
					await cache.put('__etag', new Response(newETag, {headers: {'Content-Type': 'text/plain'}}));
			}
		} catch (err) {
			console.error('Error fetching ETAG header in background:', err);
		}
	})();
});

function openDB() {
	return new Promise((resolve, reject) => {
		const request = indexedDB.open('wikiCache', 1);
		request.onupgradeneeded = e => {
			const db = e.target.result;
			if (!db.objectStoreNames.contains('pages'))
				db.createObjectStore('pages', { keyPath: 'address' });
		};
		request.onsuccess = e => resolve(e.target.result);
		request.onerror = e => reject(e.target.error);
	});
}

self.addEventListener('fetch', event => {
	const url = new URL(event.request.url);
	if (event.request.method !== 'GET')
		return;

	if (url.pathname === '/api/getAllPages')
		return fetch(event.request);

	if (event.request.url.includes('?format=json')) {
		event.respondWith((async () => {
			const db = await openDB();
			const url = new URL(event.request.url);
			let address = url.pathname.slice(1);;
			if (address.startsWith('/'))
				address = address.slice(1);

			console.log("Trying to read address " + address);
			const tx = db.transaction('pages', 'readonly');
			const req = tx.objectStore('pages').get(address);

			const cached = await new Promise((resolve, reject) => {
				req.onsuccess = ev => resolve(ev.target.result);
				req.onerror = ev => reject(ev.target.error);
			});

			if (cached && cached.json) {
				return new Response(JSON.stringify(cached.json), {
					headers: { 'Content-Type': 'application/json' }
				});
			}

			return fetch(event.request);
		})());
		return;
	}

	if (event.request.destination === 'document') {
		event.respondWith(
			(async () => {
				const cache = await caches.open('wiki');
				const cachedPage = await cache.match(event.request);
				if (cachedPage)
					return cachedPage;

				try {
					const networkResponse = await fetch(event.request);
					return networkResponse;
				} catch (err) {
					const fallback = await cache.match('/cache');
					if (fallback)
						return fallback;

					return new Response('Offline', { status: 503, statusText: 'Service Unavailable' });
				}
			})()
		);
		return;
	}

	return event.respondWith(
		caches.open('wiki').then(cache =>
			cache.match(event.request).then(cachedResponse => {
				if (cachedResponse)
					return cachedResponse;

				return fetch(event.request).then(networkResponse => {
					if (networkResponse.ok)
						cache.put(event.request, networkResponse.clone());

					return networkResponse;
				}).catch(() => cachedResponse || new Response('Offline', { status: 503 }));
			})
		)
	);
});