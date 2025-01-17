var EditDisplay;
var Edit;
var Preview;
var Decorator;
var InitialEditText;
function EditInit() {
    EditDisplay = document.getElementById("edit_display");
    Edit = document.getElementById("edit_value");
    Preview = document.getElementById("preview");
    EditDisplay.inert = true;
    if (EditDisplay == null)
        return;
    Edit.addEventListener('keydown', EditKeyDown, false);
    Edit.addEventListener('input', EditRefresh, false);
    Edit.addEventListener('paste', EditPaste, false);
    InitialEditText = Edit.value;
    var parser = new Parser({
        code: /^```([a-z]+?)?\r?\n[^`]*?\r?\n```\r?\n/,
        inlinecode: /`[^`\n\r]+?`/,
        fileinsert: /<DROPPED FILE>/,
        string: /"(\\.|[^"\r\n])*"/,
        assign: /\s([a-z]+?)=/,
        tag: /\<([^\s>]+)>?/,
        tagend: />/,
        headline3: /^[^\S\r\n]{0,3}\#\#\#(.*)\r?\n/,
        headline2: /^[^\S\r\n]{0,3}\#\#(.*)\r?\n/,
        headline: /^[^\S\r\n]{0,3}\#(.*)\r?\n/,
        bold: /\*\*(.+?)\*\*/,
        link: /!?\[(.*?)\]\(([^() ]+?)\)/,
        newline: /[\n|\r]+/,
        other: /.+?/,
    });
    Decorator = new TextareaDecorator(Edit, EditDisplay, parser);
    EditRefresh();
    Edit.focus();
    window.addEventListener("load", EditRefresh);
}
;
function EditKeyDown(e) {
    if (e.code == "Tab" || e.keyCode == 9) {
        let firstNewLine = Edit.value.lastIndexOf("\n", Edit.selectionStart);
        let lastNewLine = Edit.value.indexOf("\n", Edit.selectionEnd);
        let currSelect = Edit.value.substring(firstNewLine, lastNewLine);
        if (firstNewLine == -1)
            firstNewLine = 0;
        let lines = currSelect.split("\n");
        if (lines.length < 3 && !e.shiftKey || lastNewLine == -1) {
            document.execCommand('insertText', false, '\t');
        }
        else {
            let added = 0;
            for (let line in lines) {
                if (lines[line].trim() == "")
                    continue;
                if (e.shiftKey) {
                    if (lines[line].startsWith("\t"))
                        lines[line] = lines[line].substring(1);
                    added--;
                }
                else {
                    lines[line] = "\t" + lines[line];
                    added++;
                }
            }
            let replace = lines.join("\n");
            let hadSelection = Edit.selectionStart != Edit.selectionEnd;
            let oldStart = Edit.selectionStart;
            Edit.selectionStart = firstNewLine;
            Edit.selectionEnd = lastNewLine;
            document.execCommand('insertText', false, replace);
            if (hadSelection) {
                Edit.selectionStart = firstNewLine + 1;
                Edit.selectionEnd = lastNewLine + added;
            }
            else {
                Edit.selectionStart = Edit.selectionEnd = oldStart - 1;
            }
        }
        e.preventDefault();
        return;
    }
}
function EditPaste(e) {
    var file = e.clipboardData.files[0];
    if (file == null)
        return;
    UploadFile(file);
}
window.addEventListener('keydown', (e) => {
    var _a;
    if (Preview == null)
        return;
    if (e.ctrlKey && e.keyCode == 32) {
        (_a = document.getElementById("previewbutton")) === null || _a === void 0 ? void 0 : _a.click();
        e.preventDefault();
        return;
    }
});
function EditPreview(e, realm, title) {
    e.preventDefault();
    var target = e.target;
    var preview = document.getElementById("preview");
    if (preview.classList.contains("shown")) {
        target.classList.remove("active");
        preview.classList.remove("shown");
        Edit.focus();
        return;
    }
    target.classList.add("active");
    preview.classList.add("shown");
    fetch("/api/page/preview", { method: 'POST', headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' }, body: JSON.stringify({ text: Edit.value, realm: realm, title: title }) })
        .then(r => r.json())
        .then(json => {
        preview.children[1].innerHTML = json.html;
        preview.children[0].innerText = json.title;
    })
        .catch(err => {
        preview.children[0].innerText = "Failed to load preview!";
        preview.children[1].innerHTML = err + "<br><br>Try saving the page, there might be a captcha waiting..";
    });
    return false;
}
function ToggleProtected(e) {
    var target = e.target;
    var preview = document.getElementById("protected_checkbox");
    if (target.classList.contains("active")) {
        target.classList.remove("active");
        preview.checked = false;
        target.innerText = "PROTECT";
        return;
    }
    target.classList.add("active");
    preview.checked = true;
    target.innerText = "PROTECTED";
}
const preventUserLeaving = (event) => {
    event.preventDefault();
    event.returnValue = true;
};
function EditRefresh() {
    Edit.style.height = "5px";
    var th = Edit.scrollHeight;
    Edit.style.height = th + "px";
    if (InitialEditText != Edit.value) {
        window.addEventListener("beforeunload", preventUserLeaving);
        Edit.closest("form").addEventListener("submit", () => window.removeEventListener("beforeunload", preventUserLeaving));
    }
    else {
        window.removeEventListener("beforeunload", preventUserLeaving);
    }
    Decorator.update();
}
function CategoryChanged(e) {
    var val = e.target.value;
    var tag = "<cat>" + val + "</cat>";
    var value = Edit.value.replace(/\<cat\>(.*?)\<\/cat\>/, tag);
    if (!value.includes(tag)) {
        value = tag + "\n" + value;
    }
    Edit.value = value;
    EditRefresh();
}
function InsertAtSelection(insert) {
    const start = textarea.selectionStart;
    textarea.setRangeText(insert);
    textarea.selectionStart = textarea.selectionEnd = start;
    textarea.selectionEnd = textarea.selectionStart + insert.length;
    var event = new Event('input', { bubbles: true });
    textarea.dispatchEvent(event);
}
function ReplaceInSelection(replace, withvalue) {
    var i = textarea.value.indexOf(replace);
    textarea.value = textarea.value.replace(replace, withvalue);
    textarea.selectionStart = i + withvalue.length;
    textarea.selectionEnd = i + withvalue.length;
    var event = new Event('input', { bubbles: true });
    textarea.dispatchEvent(event);
}
function OnFileDropped(e) {
    if (e.dataTransfer.files.length != 1)
        return;
    e.preventDefault();
    var dt = e.dataTransfer;
    var file = dt.files[0];
    UploadFile(file);
}
function UploadFile(file) {
    var formData = new FormData();
    formData.append('files', file, file.name);
    fetch("/api/files/", { method: 'POST', body: formData })
        .then(r => {
        if (!r.ok)
            throw "Are you logged in?";
        return r.json();
    })
        .then(json => InsertAtSelection(json.code))
        .catch((e) => { alert("Failed to upload file!\n\n" + e.toString()); });
}
const FileInsertTag = "<DROPPED FILE>";
function OnHoverStart(e, event) {
    if (event.dataTransfer.types.indexOf("Files") == -1)
        return;
    event.preventDefault();
    if (e.classList.contains('dropping'))
        return;
    e.classList.add('dropping');
    textarea.focus();
    InsertAtSelection(FileInsertTag);
    textarea.selectionEnd = textarea.selectionStart;
}
function OnHoverOver(e, event) {
    if (event.dataTransfer.types.indexOf("Files") == -1)
        return;
    event.preventDefault();
}
function OnHoverStop(e, event) {
    if (!e.classList.contains('dropping'))
        return;
    e.classList.remove('dropping');
    ReplaceInSelection(FileInsertTag, "");
}
function InstallFileUpload() {
    textarea = document.getElementById("edit_value");
    var drope = textarea;
    textarea.addEventListener('dragenter', e => OnHoverStart(drope, e), false);
    textarea.addEventListener('dragover', e => OnHoverOver(drope, e), false);
    textarea.addEventListener('dragleave', e => OnHoverStop(drope, e), false);
    textarea.addEventListener('drop', e => OnHoverStop(drope, e), false);
    drope.addEventListener('drop', OnFileDropped, false);
}
class Navigate {
    static Init() {
        this.pageContent = document.getElementById("pagecontent");
        this.pageTitle = document.getElementById("pagetitle");
        this.pageLinks = document.getElementById("pagelinks");
        this.pageFooter = document.getElementById("pagefooter");
        this.pageTitle2 = document.getElementById("tabs_page_title");
        this.sideBar = document.getElementById("sidebar");
        this.prevLoc = document.location.href;
        if (this.prevLoc.indexOf("#") > 0) {
            this.prevLoc = this.prevLoc.substring(0, this.prevLoc.indexOf("#"));
        }
    }
    static ToPage(address, push = true) {
        this.Init();
        this.prevLoc = address;
        if (this.pageContent == null) {
            window.location.href = address;
            return true;
        }
        if (this.cache[address] != null) {
            window.scrollTo(0, 0);
            this.UpdatePage(this.cache[address]);
            this.pageContent.parentElement.classList.remove("loading");
        }
        else {
            this.pageTitle2.innerText = "Loading..";
            this.pageContent.parentElement.classList.add("loading");
            if (address.endsWith("%7Eedit") || address.endsWith("~edit") || address.endsWith("%7Ehistory") || address.endsWith("~history")) {
                window.location.href = address;
                return false;
            }
            fetch(address + "?format=json", { method: 'GET' })
                .then(r => r.text())
                .then(text => {
                text = text.trim();
                if (text.charAt(0) == "<") {
                    window.location.href = address;
                    return;
                }
                let json = JSON.parse(text);
                this.cache[address] = json;
                window.scrollTo(0, 0);
                this.UpdatePage(json);
                this.pageContent.parentElement.classList.remove("loading");
            })
                .catch((e) => {
                var json = {
                    html: "<h1>Error</h1>Failed to load page <b>" + address + "</b>" + (e ? "<p>" + e.toString() + "</p>" : ""),
                    title: "Failed to load page",
                    footer: "",
                    pageLinks: []
                };
                window.scrollTo(0, 0);
                this.UpdatePage(json);
                this.pageContent.parentElement.classList.remove("loading");
                console.warn("Failed to fetch " + address);
            });
        }
        if (push) {
            history.pushState({}, "", address);
        }
        this.UpdateSidebar();
        if (window.innerWidth <= 780) {
            var e = document.getElementById("sidebar");
            e.classList.remove("visible");
        }
        return false;
    }
    static UpdatePage(json) {
        this.pageContent.innerHTML = json.html;
        this.pageTitle.innerText = json.title;
        this.pageFooter.innerHTML = json.footer;
        this.pageLinks.innerHTML = "";
        this.pageTitle2.innerText = "";
        var a = document.createElement("a");
        a.classList.add("parent");
        a.text = "Home";
        a.href = `/${json.wikiUrl}/`;
        this.pageTitle2.appendChild(a);
        this.pageTitle2.append("/");
        var a2 = document.createElement("a");
        a2.text = json.title;
        a2.href = `/${json.wikiUrl}/${json.address}`;
        this.pageTitle2.appendChild(a2);
        var siteTitle = document.title.substring(document.title.lastIndexOf(" - "));
        document.title = json.title + siteTitle;
        for (var j = 0; j < json.pageLinks.length; j++) {
            var b = json.pageLinks[j];
            var li = document.createElement("li");
            var a = document.createElement("a");
            a.text = b.label;
            a.href = b.url;
            var icon = document.createElement("i");
            icon.classList.add("mdi");
            icon.classList.add("mdi-" + b.icon);
            if (j == 0) {
                a.classList.add("active");
            }
            a.prepend(icon);
            li.appendChild(a);
            this.pageLinks.appendChild(li);
        }
        this.InstallLinks(this.pageContent);
    }
    static UpdateSidebar() {
        let links = this.sideBar.getElementsByTagName("a");
        let address = location.href;
        if (address.indexOf("#") > 0) {
            address = address.substring(0, address.indexOf("#"));
        }
        for (var i = 0; i < links.length; i++) {
            var a = links[i];
            a.classList.remove("active");
            if (a.href == address) {
                a.classList.add("active");
                var parent = a.parentElement;
                while (parent != null) {
                    if (parent.tagName == "DETAILS") {
                        var d = parent;
                        d.open = true;
                    }
                    parent = parent.parentElement;
                }
            }
        }
        var details = this.sideBar.getElementsByTagName("details");
        for (var i = 0; i < details.length; i++) {
            a.classList.remove("active");
        }
    }
    static OnNavigated(event) {
        let address = document.location.href;
        if (address.indexOf("#") > 0) {
            address = address.substring(0, address.indexOf("#"));
        }
        if (address.endsWith(this.prevLoc))
            return;
        this.ToPage(address, false);
    }
    static InstallLinks(element) {
        var links = element.getElementsByTagName("a");
        var thisHost = window.location.host;
        for (let i = 0; i < links.length; i++) {
            var a = links[i];
            if (a.host != thisHost)
                continue;
            let val = a.getAttribute("href");
            if (val == null || val == '')
                continue;
            if (val.indexOf('#') >= 0 || val.indexOf('~') >= 0)
                continue;
            a.onclick = e => {
                if (!(e.ctrlKey || e.shiftKey || e.altKey)) {
                    Navigate.ToPage(val);
                    e.preventDefault();
                }
            };
        }
    }
    static Install() {
        this.Init();
        window.onpopstate = e => this.OnNavigated(e);
        if (this.pageContent == null)
            return true;
        this.InstallLinks(this.pageContent);
        this.InstallLinks(this.sideBar);
    }
}
Navigate.cache = {};
Navigate.prevLoc = "";
class Parser {
    constructor(rules) {
        this.parseRE = null;
        this.ruleSrc = [];
        this.ruleMap = {};
        this.add(rules);
    }
    add(rules) {
        for (var rule in rules) {
            var s = rules[rule].source;
            this.ruleSrc.push(s);
            this.ruleMap[rule] = new RegExp('^(' + s + ')$', "i");
        }
        this.parseRE = new RegExp(this.ruleSrc.join('|'), 'gmi');
    }
    ;
    tokenize(input) {
        let result = input.match(this.parseRE);
        let resultOut = [];
        let prevIdent = "";
        for (let test of result) {
            let ident = this.identify(test);
            if (prevIdent == ident) {
                resultOut[resultOut.length - 1] += test;
            }
            else {
                resultOut.push(test);
            }
            prevIdent = ident;
        }
        return resultOut;
    }
    ;
    identify(token) {
        for (var rule in this.ruleMap) {
            if (this.ruleMap[rule].test(token)) {
                return rule;
            }
        }
    }
    ;
}
;
class TextareaDecorator {
    constructor(textarea, display, parser) {
        this.input = textarea;
        this.output = display;
        this.parser = parser;
    }
    color(input, output, parser) {
        var oldTokens = output.childNodes;
        var newTokens = parser.tokenize(input);
        var firstDiff, lastDiffNew, lastDiffOld;
        for (firstDiff = 0; firstDiff < newTokens.length && firstDiff < oldTokens.length; firstDiff++)
            if (newTokens[firstDiff] !== oldTokens[firstDiff].textContent)
                break;
        while (newTokens.length < oldTokens.length)
            output.removeChild(oldTokens[firstDiff]);
        for (lastDiffNew = newTokens.length - 1, lastDiffOld = oldTokens.length - 1; firstDiff < lastDiffOld; lastDiffNew--, lastDiffOld--)
            if (newTokens[lastDiffNew] !== oldTokens[lastDiffOld].textContent)
                break;
        for (; firstDiff <= lastDiffOld; firstDiff++) {
            oldTokens[firstDiff].className = parser.identify(newTokens[firstDiff]);
            oldTokens[firstDiff].textContent = oldTokens[firstDiff].innerText = newTokens[firstDiff];
        }
        for (var insertionPt = oldTokens[firstDiff] || null; firstDiff <= lastDiffNew; firstDiff++) {
            var span = document.createElement("span");
            span.className = parser.identify(newTokens[firstDiff]);
            span.textContent = span.innerText = newTokens[firstDiff];
            output.insertBefore(span, insertionPt);
        }
    }
    ;
    update() {
        var input = textarea.value;
        if (input) {
            this.color(input, this.output, this.parser);
        }
        else {
            this.output.innerHTML = '';
        }
    }
}
function ToggleClass(element, classname) {
    var e = document.getElementById(element);
    if (e.classList.contains(classname))
        e.classList.remove(classname);
    else
        e.classList.add(classname);
}
function CopyCode(event) {
    var code = event.target.closest("div.code").innerText;
    navigator.clipboard.writeText(code);
    var btn = event.target.closest("copy");
    var icn = btn.querySelector(".mdi");
    icn.classList.replace("mdi-content-copy", "mdi-check");
    btn.classList.add("copied");
    clearTimeout(icn.copyTimeout);
    icn.copyTimeout = setTimeout(function () {
        icn.classList.replace("mdi-check", "mdi-content-copy");
        btn.classList.remove("copied");
    }, 5000);
}
var SearchInput;
var SearchResults;
var SidebarContents;
var MaxResultCount = 200;
var ResultCount = 0;
var WikiRealm = "";
var SearchDelay = null;
function InitSearch() {
    SearchInput = document.getElementById("search");
    SearchResults = document.getElementById("searchresults");
    SidebarContents = document.getElementById("contents");
    SearchInput.addEventListener("input", e => {
        clearTimeout(SearchDelay);
        SearchDelay = setTimeout(UpdateSearch, 200);
    });
    SearchInput.addEventListener("keyup", e => {
        if (e.key == "Enter" || e.keyCode == 13) {
            window.location.href = "/" + WikiRealm + "/~search?q=" + encodeURIComponent(SearchInput.value);
        }
    });
    let searchPos = window.location.pathname.indexOf(WikiRealm + "/~search:");
    if (searchPos != -1) {
        let srchTxt = window.location.pathname.substring(searchPos + (WikiRealm + "/~search:").length);
        SearchInput.value = decodeURIComponent(srchTxt);
        SearchDelay = setTimeout(UpdateSearch, 20);
    }
}
window.addEventListener('keydown', (e) => {
    if (e.key != "/" || e.keyCode != 191)
        return;
    if (document.activeElement.tagName == "INPUT")
        return;
    if (document.activeElement.tagName == "TEXTAREA")
        return;
    SearchInput.focus();
    SearchInput.value = "";
    e.preventDefault();
});
function UpdateSearch(limitResults = true) {
    if (limitResults)
        MaxResultCount = 100;
    else
        MaxResultCount = 2000;
    var child = SearchResults.lastElementChild;
    while (child) {
        SearchResults.removeChild(child);
        child = SearchResults.lastElementChild;
    }
    var string = SearchInput.value;
    var tags = [];
    var searchTerms = string.split(" ");
    searchTerms.forEach(str => {
        if (str.startsWith("is:") || str.startsWith("not:")) {
            tags.push(str);
            string = string.replace(str, "");
        }
    });
    if (string.length < 2) {
        SidebarContents.classList.remove("searching");
        SearchResults.classList.remove("searching");
        var sidebar = document.getElementById("sidebar");
        var active = sidebar.getElementsByClassName("active");
        if (active.length == 1) {
            active[0].scrollIntoView({ block: "center" });
        }
        return;
    }
    SidebarContents.classList.add("searching");
    SearchResults.classList.add("searching");
    ResultCount = 0;
    Titles = [];
    TitleCount = 0;
    SectionHeader = null;
    if (string.toUpperCase() == string && string.indexOf("_") != -1) {
        string = string.substring(0, string.indexOf("_"));
    }
    var parts = string.split(' ');
    var q = "";
    for (var i in parts) {
        if (parts[i].length < 1)
            continue;
        var t = parts[i].replace(/([^a-zA-Z0-9_-])/g, "\\$1");
        q += ".*(" + t + ")";
    }
    q += ".*";
    var regex = new RegExp(q, 'gi');
    SearchRecursive(regex, SidebarContents, tags);
    if (limitResults && ResultCount > MaxResultCount) {
        var moreresults = document.createElement('a');
        moreresults.href = "#";
        moreresults.classList.add('noresults');
        moreresults.innerHTML = (ResultCount - 100) + ' more results - show more?';
        moreresults.onclick = (e) => { UpdateSearch(false); return false; };
        SearchResults.append(moreresults);
    }
    if (SearchResults.children.length == 0) {
        var noresults = document.createElement('span');
        noresults.classList.add('noresults');
        noresults.innerHTML = 'No results.<br/>Press Enter to search the wiki.';
        SearchResults.appendChild(noresults);
    }
}
var SectionHeader;
var TitleCount = 0;
var Titles = [];
function SearchRecursive(str, el, tags) {
    var title = null;
    if (el.children.length > 0 && el.children[0].tagName == "SUMMARY") {
        title = el.children[0].children[0];
        Titles.push(title);
        TitleCount++;
    }
    var children = el.children;
    for (var i = 0; i < children.length; i++) {
        var child = children[i];
        if (child.className == "sectionheader")
            SectionHeader = child;
        if (child.tagName == "A") {
            if (child.parentElement.tagName == "SUMMARY")
                continue;
            var txt = child.getAttribute("search");
            if (txt == null)
                continue;
            var found = txt.match(str);
            if (found && tags.length > 0) {
                var niceTags = { "server": "rs", "sv": "rs",
                    "client": "rc", "cl": "rc",
                    "menu": "rm", "mn": "rm",
                    "deprecated": "depr", "internal": "intrn",
                };
                tags.forEach(str => {
                    var classSearch = str.split(":").slice(1)[0];
                    if (niceTags[classSearch])
                        classSearch = niceTags[classSearch];
                    if (str.startsWith("is:") && classSearch != null && !child.classList.contains(classSearch)) {
                        found = null;
                    }
                    if (str.startsWith("not:") && classSearch != null && child.classList.contains(classSearch)) {
                        found = null;
                    }
                });
            }
            if (found) {
                if (ResultCount < MaxResultCount) {
                    AddSearchTitle();
                    var copy = child.cloneNode(true);
                    copy.onclick = e => Navigate.ToPage(copy.href, true);
                    copy.classList.add("node" + TitleCount);
                    SearchResults.appendChild(copy);
                }
                ResultCount++;
            }
        }
        SearchRecursive(str, child, tags);
    }
    if (title != null) {
        TitleCount--;
        if (Titles[Titles.length - 1] == title) {
            Titles.pop();
        }
    }
}
function AddSearchTitle() {
    if (Titles.length == 0)
        return;
    if (SectionHeader != null) {
        var copy = SectionHeader.cloneNode(true);
        SearchResults.appendChild(copy);
        SectionHeader = null;
    }
    for (var i = 0; i < Titles.length; i++) {
        var cpy = Titles[i].cloneNode(true);
        if (cpy.href)
            cpy.onclick = e => Navigate.ToPage(cpy.href, true);
        cpy.className = "node" + ((TitleCount - Titles.length) + i);
        SearchResults.appendChild(cpy);
    }
    Titles = [];
}