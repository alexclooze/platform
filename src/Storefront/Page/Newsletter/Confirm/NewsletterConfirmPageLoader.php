<?php declare(strict_types=1);

namespace Shopware\Storefront\Page\Newsletter\Confirm;

use Shopware\Core\Framework\Routing\InternalRequest;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Framework\Page\PageLoaderInterface;
use Shopware\Storefront\Framework\Page\PageWithHeaderLoader;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class NewsletterConfirmPageLoader implements PageLoaderInterface
{
    /**
     * @var PageWithHeaderLoader|PageLoaderInterface
     */
    private $genericLoader;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function __construct(
        PageLoaderInterface $genericLoader,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->genericLoader = $genericLoader;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function load(InternalRequest $request, SalesChannelContext $context)
    {
        $page = $this->genericLoader->load($request, $context);
        $page = NewsletterConfirmPage::createFrom($page);

        $this->eventDispatcher->dispatch(
            NewsletterConfirmPageLoadedEvent::NAME,
            new NewsletterConfirmPageLoadedEvent($page, $context, $request)
        );

        return $page;
    }
}
