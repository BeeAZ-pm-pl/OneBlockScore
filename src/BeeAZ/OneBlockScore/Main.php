<?php
declare(strict_types = 1);

namespace BeeAZ\OneBlockScore;

use BeeAZ\OneBlockScore\listeners\EventListener;
use BeeAZ\OneBlockScore\listeners\TagResolveListener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

	public function onEnable(): void{
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
		$this->getServer()->getPluginManager()->registerEvents(new TagResolveListener($this), $this);
	}
}