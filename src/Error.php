<?php
/*
 * This file is a part of Relations Messenger Message Standard.
 * This package is a part of Relations Messenger.
 *
 * @see       https://github.com/relmsg/message
 * @see       https://dev.relmsg.ru/packages/message
 * @copyright Copyright (c) 2018-2020 Relations Messenger
 * @author    Oleg Kozlov <h1karo@relmsg.ru>
 * @license   Apache License 2.0
 * @license   https://legal.relmsg.ru/licenses/message
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RM\Standard\Message;

/**
 * Class Error.
 *
 * @author Oleg Kozlov <h1karo@relmsg.ru>
 *
 * @see     MessageType::ERROR
 */
class Error implements MessageInterface
{
    private int $code;
    private string $message;

    public function __construct(int $code, string $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return MessageType::ERROR;
    }

    /**
     * {@inheritdoc}
     */
    final public function toArray(): array
    {
        return [
            'type' => $this->getType(),
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
        ];
    }
}
