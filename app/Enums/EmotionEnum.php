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

    public static function translate(string $emotion): string
    {
        return match ($emotion) {
            self::ANGRY->value => 'Raiva',
            self::DISGUST->value => 'Nojo',
            self::FEAR->value => 'Medo',
            self::HAPPY->value => 'Felicidade',
            self::SAD->value => 'Tristeza',
            self::SURPRISE->value => 'Surpresa',
            self::NEUTRAL->value => 'Neutro',
            default => 'Desconhecido',
        };
    }
}
