# Test plugin for CustomUI

This plugin will send a modal form to the player on join.

**How to create a form**

```
$ui = new ModalForm("Test Plugin", "Pretty cool plugin?", "Yes", "No");
        $ui->setCallable(function (Player $player, bool $data) {
            $player->sendMessage($data ? "Thanks to XenialDan/thebigsmileXD !" : "How can it improve? Submit an issue to let me know...");
        });
        $ui->setCallableClose(function (Player $player) {
            $player->sendMessage("If there was an X button"); //this will get sent after the user closes the form without clicking any buttons.
        });
        $this->modalUIID = API::addUI($this, $ui);
```

**How to send the form to the player**

```
$ui = API::getPluginUI($this, $this->modalUIID);
        API::showUI($ui, $player);
```

# Virion/Lib

```
libs:
    - src: Terpz710/customui/customui
      version: "^3.0.0"
```
