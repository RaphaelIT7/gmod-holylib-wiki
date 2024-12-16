<?php
    class MySQL {
        private $servername = "localhost";
        private $username = "holylib"; # locahost only user :^
        private $password = "holylibiscool";
        private $db = "holylib_wiki";
        private $conn;

        private function Connect() {
           $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
    
            if (!$this->conn) {
              die("Connection failed: " . mysqli_connect_error());
            }
        }

        public function Query($sql) {
            if (!mysqli_query($this->conn, $sql)) {
                echo "Error in database: " . mysqli_error($this->conn);
            }
        }

        public function SQLStr($str) {
            return mysqli_real_escape_string($this->conn, $str);
        }

        public function TagsToDisplay($tags)
        {
            $display = "";

            if (strpos($tags, "panel") !== false) {
                $display .= "panel ";
            }

            if (strpos($tags, "type") !== false) {
                $display .= "type ";
            }

            if (strpos($tags, "function") !== false) {
                $display .= "f ";
            }

            if (strpos($tags, "method") !== false) {
                $display .= "meth ";
            }

            if (strpos($tags, "member") !== false) {
                $display .= "memb ";
            }

            if (strpos($tags, "realm-client") !== false) {
                $display .= "rc ";
            }

            if (strpos($tags, "realm-server") !== false) {
                $display .= "rs ";
            }

            if (strpos($tags, "realm-menu") !== false) {
                $display .= "rm ";
            }

            if (strpos($tags, "example") !== false) {
                $display .= "e ";
            }

            if (strpos($tags, "intrn") !== false) {
                $display .= "intrn ";
            }

            if (strpos($tags, "code") !== false) {
                $display .= "code ";
            }

            if (strpos($tags, "depr") !== false) {
                $display .= "depr ";
            }

            return rtrim($display);
        }

        public function AddPageOrUpdate($title, $tags, $address, $createdTime, $markup, $html, $views, $updated, $revisionId, $category, $searchTags, $updateCount = 0) {
            $exists = $this->GetFullPage($address);
            if (!isset($exists)) {
                $stmt = $this->conn->prepare("INSERT INTO pages (title, tags, address, createdTime, updateCount, markup, html, views, updated, revisionId, category, searchTags, fileTime, filePath) 
                VALUES (?, ?, ?, ?, $updateCount, ?, ?, $views, ?, $revisionId, ?, ?, 0, '')");
                $stmt->bind_param("sssssssss", $title, $tags, $address, $createdTime, $markup, $html, $updated, $category, $searchTags);
                $stmt->execute();
                $stmt->close();
            } else {
                $stmt = $this->conn->prepare("UPDATE pages SET title=?, tags=?, createdTime=?, updateCount=?, markup=?, html=?, views=?, updated=?, revisionId=? category=?, searchTags=? WHERE address=?");
                $stmt->bind_param("sssissisisss", $title, $tags, $createdTime, $updateCount, $markup, $html, $views, $updated, $revisionId, $category, $searchTags, $address);
                $stmt->execute();
                $stmt->close();
            }
        }

        public function AddFilePageOrUpdate($title, $tags, $address, $createdTime, $markup, $html, $views, $updated, $revisionId, $category, $searchTags, $fileTime, $filePath, $updateCount = 0) {
            $exists = $this->GetFullPage($address);
            if (!isset($exists)) {
                $stmt = $this->conn->prepare("INSERT INTO pages (title, tags, address, createdTime, updateCount, markup, html, views, updated, revisionId, category, searchTags, fileTime, filePath) 
                VALUES (?, ?, ?, ?, $updateCount, ?, ?, $views, ?, $revisionId, ?, ?, $fileTime, ?)");
                $stmt->bind_param("ssssssssss", $title, $tags, $address, $createdTime, $markup, $html, $updated, $category, $searchTags, $filePath);
                $stmt->execute();
                $stmt->close();
            } else {
                $stmt = $this->conn->prepare("UPDATE pages SET title=?, tags=?, createdTime=?, updateCount=?, markup=?, html=?, views=?, updated=?, revisionId=?, category=?, searchTags=?, fileTime=? WHERE filePath=?");
                $stmt->bind_param("sssissisissis", $title, $tags, $createdTime, $updateCount, $markup, $html, $views, $updated, $revisionId, $category, $searchTags, $fileTime, $filePath);
                $stmt->execute();
                $stmt->close();
            }
        }

        public function GetFullPage($address) {
            $result = mysqli_query($this->conn, "SELECT * FROM pages WHERE address = '" . $this->SQLStr($address) . "' LIMIT 1");

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    mysqli_free_result($result);

                    return $row;
                } else {
                    mysqli_free_result($result);
                    return;
                }
            } else {
                echo "Error: " . mysqli_error($this->conn);
            }
        }

        public function GetFullPageByFile($path) {
            $result = mysqli_query($this->conn, "SELECT * FROM pages WHERE filePath = '" . $this->SQLStr($path) . "' LIMIT 1");

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    mysqli_free_result($result);

                    return $row;
                } else {
                    mysqli_free_result($result);
                    return;
                }
            } else {
                echo "Error: " . mysqli_error($this->conn);
            }
        }

        public function GetPageForSidebarByFile($path) {
            $result = mysqli_query($this->conn, "SELECT address, tags, title FROM pages WHERE filePath = '" . $this->SQLStr($path) . "' LIMIT 1");

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    mysqli_free_result($result);

                    return $row;
                } else {
                    mysqli_free_result($result);
                    return;
                }
            } else {
                echo "Error: " . mysqli_error($this->conn);
            }
        }

        public function GetCategoryPages($category) {
            $stmt = $this->conn->prepare("SELECT address, title, category, display_tags FROM pages WHERE category = ?");
            $stmt->bind_param("s", $category);
            $stmt->execute();
            $result = $stmt->get_result();
            $addresses = array();

            while ($row = $result->fetch_assoc()) {
                $row['tags'] = $row['display_tags'];
                $addresses[] = $row;
            }

            return $addresses;
        }

        public function GetViews($address) {
            $stmt = $this->conn->prepare("SELECT views FROM pages WHERE address = ? LIMIT 1");
            $stmt->bind_param("s", $address);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                 return $row['views'];
            } else {
                return null;
            }
        }

        public function GetIncreasedViews($address) {
            $stmt = $this->conn->prepare("SELECT views FROM pages WHERE address = ? LIMIT 1");
            $stmt->bind_param("s", $address);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
            	$newViews = $row['views'] + 1;
                $stmt = $this->conn->prepare("UPDATE pages SET views = ? WHERE address = ? LIMIT 1");
                $stmt->bind_param("is", $newViews, $address);
                $stmt->execute();

                return $newViews;
            } else {
                return null;
            }
        }

        public function GetCategory($address) {
            $stmt = $this->conn->prepare("SELECT category FROM pages WHERE address = ? LIMIT 1");
            $stmt->bind_param("s", $address);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                 return $row['category'];
            } else {
                return null;
            }
        }

        public function GetUpdateCount($address) {
            $stmt = $this->conn->prepare("SELECT updateCount FROM pages WHERE address = ? LIMIT 1");
            $stmt->bind_param("s", $address);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                 return $row['updateCount'];
            } else {
                return 0;
            }
        }

        public function GetRevision($address) {
            $stmt = $this->conn->prepare("SELECT revisionId FROM pages WHERE address = ? LIMIT 1");
            $stmt->bind_param("s", $address);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                 return $row['revisionId'];
            } else {
                return 0;
            }
        }

        public function GetSearchTags($address) {
            $stmt = $this->conn->prepare("SELECT searchTags FROM pages WHERE address = ? LIMIT 1");
            $stmt->bind_param("s", $address);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                 return $row['searchTags'];
            } else {
                return '';
            }
        }

        public function GetLastUpdated($address) {
            $stmt = $this->conn->prepare("SELECT updated FROM pages WHERE address = ? LIMIT 1");
            $stmt->bind_param("s", $address);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                 return $row['updated'];
            } else {
                return 'Unknown';
            }
        }

        public function GetCreatedTime($address) {
            $stmt = $this->conn->prepare("SELECT createdTime FROM pages WHERE address = ? LIMIT 1");
            $stmt->bind_param("s", $address);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                 return $row['createdTime'];
            } else {
                return '';
            }
        }

        public function AddView($address) {

        }

        public function UpdatePage($markup) {

        }

        public function GetHTML($address) {
            $stmt = $this->conn->prepare("SELECT html FROM pages WHERE address = ? LIMIT 1");
            $stmt->bind_param("s", $address);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                 return $row['html'];
            } else {
                return '';
            }
        }

        public function GetMarkup($address) {
            $stmt = $this->conn->prepare("SELECT markup FROM pages WHERE address = ? LIMIT 1");
            $stmt->bind_param("s", $address);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                 return $row['markup'];
            } else {
                return '';
            }
        }

        public function GetTitle($address) {
            $stmt = $this->conn->prepare("SELECT title FROM pages WHERE address = ? LIMIT 1");
            $stmt->bind_param("s", $address);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                 return $row['title'];
            } else {
                return null;
            }
        }

        public function GetTags($address) {
            $stmt = $this->conn->prepare("SELECT tags FROM pages WHERE address = ? LIMIT 1");
            $stmt->bind_param("s", $address);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                 return $row['tags'];
            } else {
                return null;
            }
        }

        public function SetCachePage($title, $html, $updated, $updateCount = 0) {
            $exists = $this->GetCachePage($title);
            if (!isset($exists) || strlen($exists) == 0) {
                $stmt = $this->conn->prepare("INSERT INTO cache (title, updateCount, html, updated) 
                VALUES (?, ?, ?, ?)");
                $stmt->bind_param("siss", $title, $updateCount, $html, $updated);
                $stmt->execute();
                $stmt->close();
            } else {
                $stmt = $this->conn->prepare("UPDATE cache SET updateCount=?, html=?, updated=? WHERE title=?");
                $stmt->bind_param("isss", $updateCount, $html, $updated, $title);
                $stmt->execute();
                $stmt->close();
            }
        }

        public function GetCachePage($title) {
            $stmt = $this->conn->prepare("SELECT html FROM cache WHERE title = ? LIMIT 1");
            $stmt->bind_param("s", $title);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                 return $row['html'];
            } else {
                return '';
            }
        }

        public function Init() {
            $this->Connect();
            $this->Query("CREATE DATABASE IF NOT EXISTS " . $this->db);

            $this->conn->select_db($this->db);
            $this->Query("CREATE TABLE IF NOT EXISTS pages (
                title VARCHAR(255),
                tags VARCHAR(255),
                address VARCHAR(255) UNIQUE,
                createdTime VARCHAR(32),
                updateCount INT DEFAULT 0,
                markup TEXT,
                html TEXT,
                views BIGINT DEFAULT 0,
                updated VARCHAR(32),
                revisionId BIGINT DEFAULT 0,
                category VARCHAR(32),
                searchTags VARCHAR(64),
                fileTime BIGINT,
                filePath VARCHAR(255),
                INDEX idx_category (category),
                INDEX idx_filePath (filePath)
            );");

            $this->Query("CREATE TABLE IF NOT EXISTS cache (
                title VARCHAR(255),
                html TEXT,
                updateCount INT DEFAULT 0,
                updated VARCHAR(32),
                INDEX idx_titles (title)
            );");
        }
    }
?>