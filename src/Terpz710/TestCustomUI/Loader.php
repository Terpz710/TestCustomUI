<?php

namespace Terpz710\TestCustomUI;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat as TF;
use xenialdan\customui\windows\ModalForm;
use xenialdan\customui\API;

class Loader extends PluginBase implements Listener {

    private $modalUIID;

    public function onEnable(): void {
        $this->getLogger()->info("CustomUI test plugin has been enabled!");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        $ui = new ModalForm("Test Plugin", "Pretty cool plugin?", "Yes", "No");
        $ui->setCallable(function (Player $player, bool $data) {
            $player->sendMessage($data ? "Thanks to XenialDan/thebigsmileXD !" : "How can it improve? Submit an issue to let me know...");
        });
        $ui->setCallableClose(function (Player $player) {
            $player->sendMessage("If there was an X button"); //this will get sent after the user closes the form without clicking any buttons.
        });
        $this->modalUIID = API::addUI($this, $ui);
    }

    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $ui = API::getPluginUI($this, $this->modalUIID);
        API::showUI($ui, $player);
    }
}