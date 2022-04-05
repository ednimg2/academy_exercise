<?php

interface CloudProviderInterface {
    public function storeFile($name);
    public function getFile($name);
    public function createServer($region);
    public function listServers($region);
    public function getCDNAddress();
}

class Amazon implements CloudProviderInterface {

    public function storeFile($name) {
        echo "store a file on Amazon";
    }

    public function getFile($name) {
        echo "get a file from Amazon";
    }

    public function createServer($region) {
        echo "create server on Amazon";
    }

    public function listServers($region) {
        echo "list servers from Amazon";
    }

    public function getCDNAddress() {
        echo "get CDN address on Amazon";
    }
}

class Dropbox implements CloudProviderInterface {

    public function storeFile($name) {
        echo "store a file on Dropbox";
    }

    public function getFile($name) {
        echo "get a file from Dropbox";
    }

    public function createServer($region) {
        // Not supported by Dropbox
    }

    public function listServers($region) {
        // Not supported by Dropbox
    }

    public function getCDNAddress() {
        // Not supported by Dropbox
    }
}