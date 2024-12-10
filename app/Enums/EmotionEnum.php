<?php

namespace App\Enums;

enum EmotionEnum: string
{
    case ANGRY = 'angry';
    case DISGUST = 'disgust';
    case FEAR = 'fear';
    case HAPPY = 'happy';
    case SAD = 'sad';
    case SURPRISE = 'surprise';
    case NEUTRAL = 'neutral';

    public static function list(): array
    {
        return array_column(self::cases(), 'value');
    }
}
