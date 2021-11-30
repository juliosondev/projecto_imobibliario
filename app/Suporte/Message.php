<?php

namespace App\Suporte;

class Message
{
    // Conteúdo da mensagem
    private $text;
    // Tipo de mensagem
    private $type;

    public function getType()
    {
        # code...
        return $this->type;
    }
    public function getText()
    {
        # code...
        return $this->text;
    }

    public function erro(string $mensagem): Message
    {
        # code...
        $this->type = 'error';
        $this->text = $mensagem;
        return $this;
    }
    public function success(string $mensagem): Message
    {
        # code...
        $this->type = 'success';
        $this->text = $mensagem;
        return $this;
    }
    public function render()
    {
        # code...
        return "<div class='message {$this->getType()}'>{$this->getText()}</div>";
    }

}
