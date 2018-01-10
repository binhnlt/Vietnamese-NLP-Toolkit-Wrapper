<?php

class VietnameseNlpToolkitWraper
{
    private $_nodePath = 'node';
    private $_vntkCliPath = 'D:/02_projects/vntk/bin/vntk.js';

    public function __construct()
    {

    }

    public function tokenize($text)
    {
        return (array) $this->_executor('tok', $text);
    }

    public function segmentize($text)
    {
        return (array) $this->_executor('ws', $text);
    }

    private function _executor($command, $text, $params = [])
    {
        $output = json_decode(exec("{$this->_nodePath} {$this->_vntkCliPath} {$command} \"{$text}\"  --json"));
        return $output;
    }
}


var_dump((new VietnameseNlpToolkitWraper())->tokenize('Tôi tên là Nguyễn Lưu Thanh Bình'));