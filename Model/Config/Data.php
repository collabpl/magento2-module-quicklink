<?php
/**
 * @category  Collab
 * @package   Collab\QuickLink
 * @author    Marcin Jędrzejewski <m.jedrzejewski@collab.pl>
 * @copyright 2024 Collab
 * @license   MIT
 */

declare(strict_types=1);

namespace Collab\QuickLink\Model\Config;

use Collab\QuickLink\Api\Data\ConfigInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Data implements ConfigInterface
{
    public function __construct(
        protected readonly ScopeConfigInterface $scopeConfig
    ) {
    }

    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_QUICKLINK_ENABLED);
    }

    public function getPriority(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_QUICKLINK_PRIORITY);
    }

    public function getTimeout(): int
    {
        return (int) $this->scopeConfig->getValue(self::XML_PATH_QUICKLINK_TIMEOUT);
    }

    public function getThrottle(): int
    {
        return (int) $this->scopeConfig->getValue(self::XML_PATH_QUICKLINK_THROTTLE);
    }

    public function getThreshold(): float
    {
        return (float) $this->scopeConfig->getValue(self::XML_PATH_QUICKLINK_THRESHOLD);
    }

    public function isPrerender(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_QUICKLINK_PRERENDER);
    }

    public function getDelay(): int
    {
        return (int) $this->scopeConfig->getValue(self::XML_PATH_QUICKLINK_DELAY);
    }

    public function getIgnores(): string
    {
        return $this->scopeConfig->getValue(self::XML_PATH_QUICKLINK_IGNORES);
    }
}
