<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use Psr\Http\Message\RequestInterface;
use TgBotApi\BotApiBase\Exception\BadRequestException;
use TgBotApi\BotApiBase\Type\UpdateType;

/**
 * Class WebhookFetcher.
 */
class WebhookFetcher implements WebhookFetcherInterface
{

    /**
     * WebhookFetcher constructor.
     */
    public function __construct(private readonly NormalizerInterface $normalizer)
    {
    }

    /**
     * @throws BadRequestException
     */
    public function fetch(mixed $request): UpdateType
    {
        $input = \json_decode(json: $this->getContents(request: $request));
        if (!($input instanceof \stdClass)) {
            throw new BadRequestException(message: 'Request content must be valid JSON object.');
        }

        return $this->normalizer->denormalize(data: $input, type: UpdateType::class);
    }

    /**
     * @param $request
     *
     * @throws BadRequestException
     */
    private function getContents($request): string
    {
        if ($request instanceof RequestInterface) {
            return $request->getBody()->getContents();
        }

        if (\is_string(value: $request)) {
            return $request;
        }

        throw new BadRequestException(
            message: 'Request must be instance of Psr\Http\Message\RequestInterface or string.');
    }
}
