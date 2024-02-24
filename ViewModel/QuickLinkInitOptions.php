<?php
/**
 * @category  Collab
 * @package   Collab\QuickLink
 * @author    Marcin Jędrzejewski <m.jedrzejewski@collab.pl>
 * @copyright 2024 Collab
 * @license   MIT
 */

declare(strict_types=1);

namespace Collab\QuickLink\ViewModel;

use Collab\QuickLink\Api\Data\ConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class QuickLinkInitOptions implements ArgumentInterface
{
    public function __construct(
        protected readonly ConfigInterface $config
    ) {
    }

    public function getOptions(): string
    {
        return json_encode([
            'priority' => $this->config->getPriority(),
            'timeout' => $this->config->getTimeout(),
            'throttle' => $this->config->getThrottle(),
            'threshold' => $this->config->getThreshold(),
            'prerender' => $this->config->isPrerender(),
            'delay' => $this->config->getDelay(),
            'ignores' => $this->getIgnores(),
        ]) ?: '{}';
    }

    public function getIgnores(): array
    {
        return explode(
            ',',
            preg_replace(
                "/\r\n|\r|\n/",
                '',
                $this->config->getIgnores()
            )
        );
    }
}
