<?php

namespace App\Filament\Resources\Umkms\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UmkmForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('product_name')
                    ->label('Nama Produk')
                    ->required()
                    ->maxLength(255),

                TextInput::make('business_name')
                    ->label('Nama Usaha')
                    ->maxLength(255),

                TextInput::make('owner_name')
                    ->label('Nama Pemilik')
                    ->maxLength(255),

                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'makanan' => 'Makanan',
                        'minuman' => 'Minuman',
                        'kerajinan' => 'Kerajinan',
                        'pertanian' => 'Pertanian',
                        'peternakan' => 'Peternakan',
                        'jasa' => 'Jasa',
                        'lainnya' => 'Lainnya',
                    ])
                    ->required()
                    ->searchable(),

                TextInput::make('hamlet')
                    ->label('Dusun')
                    ->maxLength(255),

                TextInput::make('production_type')
                    ->label('Jenis Produksi')
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(5)
                    ->columnSpanFull(),

                TextInput::make('phone')
                    ->label('Nomor Telepon/WhatsApp')
                    ->tel()
                    ->maxLength(20),

                FileUpload::make('image')
                    ->label('Foto Produk')
                    ->image()
                    ->disk('public')
                    ->directory('umkms')
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