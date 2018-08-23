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
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $log_file_default = 'c:/php/logfile.txt';
        } else {
            $log_file_default = '/Users/satria.persada/Sites/mvcme/logfile.txt';
        }
        $lfile = $this->log_file ? $this->log_file : $log_file_default;
        $this->fp = fopen($lfile, 'a') or exit("Can't open $lfile!");
    }

}
