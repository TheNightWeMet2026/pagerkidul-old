<?php

namespace App\Filament\Resources\VillageProfiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VillageProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('village_name')
                    ->label('Nama Desa')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi Desa')
                    ->rows(5)
                    ->columnSpanFull(),

                Textarea::make('vision')
                    ->label('Visi')
                    ->rows(4)
                    ->columnSpanFull(),

                Textarea::make('missions')
                    ->label('Misi')
                    ->helperText('Tuliskan setiap misi pada baris baru.')
                    ->rows(8)
                    ->columnSpanFull(),

                TextInput::make('address')
                    ->label('Alamat')
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->maxLength(30),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->maxLength(255),

                TextInput::make('service_hours')
                    ->label('Jam Pelayanan')
                    ->placeholder('Senin–Jumat, 08.00–15.00')
                    ->maxLength(255),

                FileUpload::make('profile_image')
                    ->label('Foto Desa')
                    ->image()
                    ->disk('public')
                    ->directory('village-profile')
                    ->visibility('public')
                    ->imageEditor()
                    ->maxSize(3072),
            ]);
    }
}