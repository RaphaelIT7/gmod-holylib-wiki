<?php
    class Importer {
        private $MySQL;
        private $Parser;

        public function ImportPage($page, $category, $view_count = 0) {
            $lastChanged = filemtime($page);
            $sqlPage = $this->MySQL->GetFullPageByFile($page);
            if (isset($sqlPage) && $sqlPage['fileTime'] == $lastChanged) # file wasn't updated
            	return;

           	$file = $this->Parser->OpenFile($page);

            $title = $this->Parser->PageTitle($file);
            $tags = $this->Parser->GetTags($file);
            $address = $this->Parser->PageAddress($file);
            $createdTime = isset($sqlPage) ? $sqlPage['createdTime'] : '';
            $markup = $file;
            $html = $this->Parser->text($file);
            $views = isset($sqlPage) ? $sqlPage['views'] : 0;
            $updated = 'Recently';
            $revisionId = 0;
            # $category = $category;
            $searchTags = '';
            $fileTime = $lastChanged;
            $filePath = $page;
            $updateCount = isset($sqlPage) ? ($sqlPage['updateCount'] + 1) : 0;

            $this->MySQL->AddFilePageOrUpdate($title, $tags, $address, $createdTime, $markup, $html, $views, $updated, $revisionId, $category, $searchTags, $fileTime, $filePath, $updateCount);
        }

        public function ImportEverything($categories, $config) {
        	foreach ($categories as &$category) {
                foreach ($category['categories'] as &$chapter) {
                    $path = $config['pages_path'] . $chapter['path'] . '/';
                    $files = file_exists($path) ? array_diff(scandir($path), array('..', '.')) : array();
                    foreach ($files as &$page) {
                        if (is_dir($path . $page)) {
                            $this->ImportPage($path . '/' . $page . '/' . $page . '.md', $page);
                            $fullpath = $path . $page;
                            $subFiles = array_diff(scandir($fullpath), array('..', '.', $page . '.md'));
                            foreach($subFiles as &$subPage) {
                            	$this->ImportPage($fullpath . '/' . $subPage, $page);
                            }
                        } else {
                            $this->ImportPage($path . '/' . $page, $chapter['path']);
                        }
                    }
                }
            }
        }

        public function Init($MySQL, $Parser) {
            $this->MySQL = $MySQL;
            $this->Parser = $Parser;
        }
    }

    //if (strpos(__FILE__, $_SERVER['SCRIPT_FILENAME']) != 0) {
        //include('mysql.php');
        // ToDo
    //} 
?>