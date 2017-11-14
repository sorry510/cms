<?php
class FileClass{
    /**
     * 建立文件夹
     *
     * @param string $aimUrl
     * @return viod
     */
    function createDir($aimUrl) {
        $aimUrl = str_replace('', DIRECTORY_SEPARATOR, $aimUrl);
        $aimDir = '';
        $arr = explode(DIRECTORY_SEPARATOR, $aimUrl);
        $result = true;
        foreach ($arr as $str) {
            $aimDir .= $str . DIRECTORY_SEPARATOR;
            if (!@is_dir($aimDir)) {
                $result = @mkdir($aimDir);
            }
        }
        return $result;
    }

    /**
     * 建立文件
     *
     * @param string $aimUrl 
     * @param boolean $overWrite 该参数控制是否覆盖原文件
     * @return boolean
     */
    function createFile($aimUrl, $overWrite = false) {
        if (file_exists($aimUrl) && $overWrite == false) {
            return false;
        } else if (file_exists($aimUrl) && $overWrite == true) {
            $this->unlinkFile($aimUrl);
        }
        $aimDir = dirname($aimUrl);
        $this->createDir($aimDir);
        @touch($aimUrl);
        return true;
    }

    /**
     * 移动文件夹
     *
     * @param string $oldDir
     * @param string $aimDir
     * @param boolean $overWrite 该参数控制是否覆盖原文件
     * @return boolean
     */
    function moveDir($oldDir, $aimDir, $overWrite = false) {
        $aimDir = str_replace('', DIRECTORY_SEPARATOR, $aimDir);
        $aimDir = substr($aimDir, -1) == DIRECTORY_SEPARATOR ? $aimDir : $aimDir . DIRECTORY_SEPARATOR;
        $oldDir = str_replace('', DIRECTORY_SEPARATOR, $oldDir);
        $oldDir = substr($oldDir, -1) == DIRECTORY_SEPARATOR ? $oldDir : $oldDir . DIRECTORY_SEPARATOR;
        if (!@is_dir($oldDir)) {
            return false;
        }
        if (!file_exists($aimDir)) {
            $this->createDir($aimDir);
        }
        $dirHandle = @opendir($oldDir);
        if (!$dirHandle) {
            return false;
        }
        while (false !== ($file = @readdir($dirHandle))) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            if (!@is_dir($oldDir . $file)) {
                $this->moveFile($oldDir . $file, $aimDir . $file, $overWrite);
            } else {
                $this->moveDir($oldDir . $file, $aimDir . $file, $overWrite);
            }
        }
        closedir($dirHandle);
        return rmdir($oldDir);
    }

    /**
     * 移动文件
     *
     * @param string $fileUrl 源
     * @param string $aimUrl 
     * @param boolean $overWrite 该参数控制是否覆盖原文件
     * @return boolean
     */
    function moveFile($fileUrl, $aimUrl, $overWrite = false) {
        if (!file_exists($fileUrl)) {
            return false;
        }
        if (file_exists($aimUrl) && $overWrite = false) {
            return false;
        } elseif (file_exists($aimUrl) && $overWrite = true) {
            $this->unlinkFile($aimUrl);
        }
        $aimDir = dirname($aimUrl);
        $this->createDir($aimDir);
        @rename($fileUrl, $aimUrl);
        return true;
    }

    /**
     * 删除文件夹
     *
     * @param string $aimDir
     * @return boolean
     */
    function unlinkDir($aimDir) {
        $aimDir = str_replace('', DIRECTORY_SEPARATOR, $aimDir);
        $aimDir = substr($aimDir, -1) == DIRECTORY_SEPARATOR ? $aimDir : $aimDir . DIRECTORY_SEPARATOR;
        if (!@is_dir($aimDir)) {
            return false;
        }
        $dirHandle = @opendir($aimDir);
        while (false !== ($file = @readdir($dirHandle))) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            if (!@is_dir($aimDir . $file)) {
                $this->unlinkFile($aimDir . $file);
            } else {
                $this->unlinkDir($aimDir . $file);
            }
        }
        @closedir($dirHandle);
        return @rmdir($aimDir);
    }

    /**
     * 删除文件
     *
     * @param string $aimUrl
     * @return boolean
     */
    function unlinkFile($aimUrl) {
        if (file_exists($aimUrl)) {
            unlink($aimUrl);
            return true;
        } else {
            return false;
        }
    }

    /**
     * 复制文件夹
     *
     * @param string $oldDir
     * @param string $aimDir
     * @param boolean $overWrite 该参数控制是否覆盖原文件
     * @return boolean
     */
    function copyDir($oldDir, $aimDir, $overWrite = false) {
        $aimDir = str_replace('', DIRECTORY_SEPARATOR, $aimDir);
        $aimDir = substr($aimDir, -1) == DIRECTORY_SEPARATOR ? $aimDir : $aimDir . DIRECTORY_SEPARATOR;
        $oldDir = str_replace('', DIRECTORY_SEPARATOR, $oldDir);
        $oldDir = substr($oldDir, -1) == DIRECTORY_SEPARATOR ? $oldDir : $oldDir . DIRECTORY_SEPARATOR;
        if (!@is_dir($oldDir)) {
            return false;
        }
        if (!file_exists($aimDir)) {
            $this->createDir($aimDir);
        }
        $dirHandle = opendir($oldDir);
        while (false !== ($file = readdir($dirHandle))) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            if (!@is_dir($oldDir . $file)) {
                $this->copyFile($oldDir . $file, $aimDir . $file, $overWrite);
            } else {
                $this->copyDir($oldDir . $file, $aimDir . $file, $overWrite);
            }
        }
        return @closedir($dirHandle);
    }

    /**
     * 复制文件
     *
     * @param string $fileUrl
     * @param string $aimUrl
     * @param boolean $overWrite 该参数控制是否覆盖原文件
     * @return boolean
     */
    function copyFile($fileUrl, $aimUrl, $overWrite = false) {
        if (!file_exists($fileUrl)) {
            return false;
        }
        if (file_exists($aimUrl) && $overWrite == false) {
            return false;
        } elseif (file_exists($aimUrl) && $overWrite == true) {
            $this->unlinkFile($aimUrl);
        }
        $aimDir = dirname($aimUrl);
        $this->createDir($aimDir);
        @copy($fileUrl, $aimUrl);
        return true;
    }

}