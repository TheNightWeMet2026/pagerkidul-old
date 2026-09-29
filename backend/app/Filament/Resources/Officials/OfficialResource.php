<?php

namespace App\Filament\Resources\Officials;

use App\Filament\Resources\Officials\Pages\CreateOfficial;
use App\Filament\Resources\Officials\Pages\EditOfficial;
use App\Filament\Resources\Officials\Pages\ListOfficials;
use App\Filament\Resources\Officials\Pages\ViewOfficial;
use App\Filament\Resources\Officials\Schemas\OfficialForm;
use App\Filament\Resources\Officials\Schemas\OfficialInfolist;
use App\Filament\Resources\Officials\Tables\OfficialsTable;
use App\Models\Official;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OfficialResource extends Resource
{
    protected static ?string $model = Official::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedUserGroup;

    protected static ?string $navigationLabel = 'Perangkat Desa';

    protected static ?string $modelLabel = 'Perangkat Desa';

    protected static ?string $pluralModelLabel = 'Perangkat Desa';

    protected static string|UnitEnum|null $navigationGroup = 'Konten Desa';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return OfficialForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OfficialInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OfficialsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOfficials::route('/'),
            'create' => CreateOfficial::route('/create'),
            'view' => ViewOfficial::route('/{record}'),
            'edit' => EditOfficial::route('/{record}/edit'),
        ];
    }
}