<?php
declare(strict_types=1);

namespace Fred;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Load extends PluginBase {

    private static self $instance;
    private Config $config;

    public function onEnable(): void {
        self::$instance = $this;

        @mkdir($this->getDataFolder());
        $this->saveResource('config.yml');
        $this->config = new Config($this->getDataFolder() . 'config.yml', Config::YAML);

        $this->getServer()->getPluginManager()->registerEvents(new CoordinateListener(), $this);
    }

    public static function getInstance(): self {
        return self::$instance;
    }

    public function getConfigData(): Config {
        return $this->config;
    }
}