<?php
    class Importer {
        private $MySQL;
        private $Parser;

        function getTextBeforeLastSlash($input) {
            $lastSlashPosition = strrpos($input, '/');
            if ($lastSlashPosition !== false)
               return substr($input, 0, $lastSlashPosition);

            return $input;
        }

        public function ImportPage($page, $category, $fullUpdate = false, $view_count = 0, $addressOverride = NULL) {
            $lastChanged = filemtime($page);
            $sqlPage = $this->MySQL->GetFullPageByFile($page);
            if (isset($sqlPage) && $sqlPage['fileTime'] == $lastChanged && !$fullUpdate) # file wasn't updated
                return;

            $file = $this->Parser->OpenFile($page);

            $title = $this->Parser->PageTitle($file);
            $tags = $this->Parser->GetTags($file);
            $address = isset($addressOverride) ? $addressOverride : $this->Parser->PageAddress($file);
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
            #echo "Updating " . $page;

            $this->MySQL->AddFilePageOrUpdate($title, $tags, $address, $createdTime, $markup, $html, $views, $updated, $revisionId, $category, $searchTags, $fileTime, $filePath, $updateCount);

            #$categoryFilePath = $this->getTextBeforeLastSlash($page) . '/' . $category . ".md";
            #if (!$this->Parser->FileExists($categoryFilePath) || $page == $categoryFilePath)
            # 	return;

            #$this->ImportPage($categoryFilePath, $category, true);

            if (!$fullUpdate)
            	$this->ImportEverything(true);
        }

        public function ImportEverything($fullUpdate = false) {
            foreach ($this->Parser->categories as &$category) {
                foreach ($category['categories'] as &$chapter) {
                    $path = $this->Parser->config['pages_path'] . $chapter['path'] . '/';
                    $files = file_exists($path) ? array_diff(scandir($path), array('..', '.')) : array();
                    foreach ($files as &$page) {
                        if (is_dir($path . $page)) {
                            $this->ImportPage($path . $page . '/' . $page . '.md', $page, $fullUpdate);
                            $fullpath = $path . $page;
                            $subFiles = array_diff(scandir($fullpath), array('..', '.', $page . '.md'));
                            foreach($subFiles as &$subPage) {
                                $this->ImportPage($fullpath . '/' . $subPage, $page, $fullUpdate);
                            }
                        } else {
                            $this->ImportPage($path . $page, $chapter['path'], $fullUpdate);
                        }
                    }
                }
            }

            $this->ImportPage($this->Parser->config['pages_path'] . $this->Parser->config['front_page'], '', $fullUpdate, NULL, "");
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