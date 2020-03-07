<?php
/**
 * This file is a part of Relations Messenger API Message Standard.
 * This package is a part of Relations Messenger.
 *
 * @link      https://gitlab.com/relmsg/message
 * @link      https://dev.relmsg.ru/packages/message
 * @copyright Copyright (c) 2018-2020 Relations Messenger
 * @author    h1karo <h1karo@outlook.com>
 * @license   Apache License 2.0
 * @license   https://legal.relmsg.ru/licenses/message
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RM\Standard\Message\Serializer;

use RM\Standard\Message\Error;
use RM\Standard\Message\Format\FormatterException;
use RM\Standard\Message\MessageInterface;
use RM\Standard\Message\MessageType;

/**
 * Class ResponseSerializer
 *
 * @package RM\Standard\Message\Serializer
 * @author  h1karo <h1karo@outlook.com>
 * @see     MessageType::ERROR
 */
class ErrorSerializer extends AbstractMessageSerializer
{
    /**
     * @inheritDoc
     * @throws FormatterException
     * @throws SerializerException
     */
    public function deserialize(string $message): MessageInterface
    {
        $array = $this->formatter->decode($message);
        if (!$this->supports($message)) {
            throw new SerializerException(sprintf('%s can not deserialize this message.', static::class));
        }

        return new Error($array['code'], $array['message']);
    }

    /**
     * @inheritDoc
     */
    protected function getSupportTypes(): array
    {
        return [MessageType::ERROR];
    }

    protected function getRequiredProperties(): array
    {
        return ['code', 'message'];
    }
}