<?php

namespace Pomm\Test\Connection;

use Pomm\Connection\Database;
use Pomm\Exception\Exception;
use Pomm\Converter;
use Pomm\Type;

class DatabaseTest extends \PHPUnit_Framework_TestCase
{
    public function getDsns()
    {
        return array(
            array('pgsql://user:pass@host:12345/db'),
            array('pgsql://user@host:12345/db'),
            array('pgsql://user@!/var/run/postgresql!/db'),
            array('pgsql://user@!/var/run/postgresql!:12345/db'),
            array('pgsql://user@192.168.0.1/db'),
            array('pgsql://user:pass@telenet.host.com:9999/db'),
            array('pgsql://user/db'),
            array('pgsql://user/some.db'),
            array('pgsql://user:&~"#\'{([-|`_\\^])+=}$*%!/:.;?,@host:12345/db'),
            array('pgsql://some_user:azerty0/some_db')
        );
    }

    /**
     * @dataProvider getDsns
     **/
    public function testProcessDsn($dsn)
    {
        $database = new Database(array('dsn' => $dsn));
        $this->assertInstanceOf('\Pomm\Connection\Database', $database, "Database is an instance.");
    }
}

