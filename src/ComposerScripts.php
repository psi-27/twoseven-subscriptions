<?php

namespace TwoSeven;

use Composer\Script\Event;

class ComposerScripts
{
    /**
     * Handle the post-install Composer event.
     *
     * @param \Composer\Script\Event $event
     * @return void
     */
    public static function postInstall(Event $event)
    {
        require_once $event->getComposer()->getConfig()->get('vendor-dir') . '/autoload.php';
        echo "Subscriptions package installed successfully" . PHP_EOL;
    }

    /**
     * Handle the post-update Composer event.
     *
     * @param \Composer\Script\Event $event
     * @return void
     */
    public static function postUpdate(Event $event)
    {
        require_once $event->getComposer()->getConfig()->get('vendor-dir') . '/autoload.php';
        echo "Subscriptions package updated successfully" . PHP_EOL;
    }

    public static function prePackageUninstall(Event $event)
    {
        require_once $event->getComposer()->getConfig()->get('vendor-dir') . '/autoload.php';
        echo "Subscriptions package removed successfully" . PHP_EOL;
    }

}
