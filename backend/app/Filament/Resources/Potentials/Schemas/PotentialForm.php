<?php

namespace App\Filament\Resources\Potentials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PotentialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Nama Potensi')
                    ->required()
                    ->maxLength(255),

                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'pertanian' => 'Pertanian',
                        'peternakan' => 'Peternakan',
                        'perkebunan' => 'Perkebunan',
                        'wisata' => 'Wisata',
                        'kerajinan' => 'Kerajinan',
                        'lainnya' => 'Lainnya',
                    ])
                    ->required()
                    ->searchable(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(5)
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Gambar Potensi')
                    ->image()
                    ->disk('public')
                    ->directory('potentials')
                    ->visibility('public')
                    ->imageEditor()
                    ->maxSize(2048),

                TextInput::make('sort_order')
                    ->label('Urutan Tampilan')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->required(),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true)
                    ->required(),
            ]);
    }
}