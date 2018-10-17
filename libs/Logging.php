<?php

/*
 * mymvc ;
 * Logging.php ;
 * Satria Persada <triasada@yahoo.com> ;
 * Nov 9, 2017;
 * 12:15:03 AM;
 * Jakarta International Container Terminal (JICT);
 */

class Logging {

    private $log_file, $fp;

    public function lfile($path) {
        $this->log_file = $path;
    }

    public function lwrite($message) {
        if (!is_resource($this->fp)) {
            $this->lopen();
        }
        $script_name = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
        $time = @date('[d/M/Y:H:i:s]');
        fwrite($this->fp, "$time ($script_name) $message" . PHP_EOL);
    }

    public function lclose() {
        fclose($this->fp);
    }

    private function lopen() {

        $log_file_default = LOG_PATH;
        $lfile = $this->log_file ? $this->log_file : $log_file_default;
        $this->fp = fopen($lfile, 'a') or exit("Can't open $lfile!");
    }

}
