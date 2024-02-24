<?php
/**
 * @category  Collab
 * @package   Collab\QuickLink
 * @author    Marcin Jędrzejewski <m.jedrzejewski@collab.pl>
 * @copyright 2024 Collab
 * @license   MIT
 */

declare(strict_types=1);

namespace Collab\QuickLink\Api\Data;

interface ConfigInterface
{
    public const XML_PATH_QUICKLINK_ENABLED = "collab_quicklink/general/enabled";
    public const XML_PATH_QUICKLINK_PRIORITY = "collab_quicklink/general/priority";
    public const XML_PATH_QUICKLINK_TIMEOUT = "collab_quicklink/general/timeout";
    public const XML_PATH_QUICKLINK_THROTTLE = "collab_quicklink/general/throttle";
    public const XML_PATH_QUICKLINK_THRESHOLD = "collab_quicklink/general/threshold";
    public const XML_PATH_QUICKLINK_PRERENDER = "collab_quicklink/general/prerender";
    public const XML_PATH_QUICKLINK_DELAY = "collab_quicklink/general/delay";
    public const XML_PATH_QUICKLINK_IGNORES = "collab_quicklink/general/ignores";

    public function isEnabled(): bool;
    public function getPriority(): bool;
    public function getTimeout(): int;
    public function getThrottle(): int;
    public function getThreshold(): float;
    public function isPrerender(): bool;
    public function getDelay(): int;
    public function getIgnores(): string;
}
