<?php

namespace App\Filament\Resources\Statistics;

use App\Filament\Resources\Statistics\Pages\CreateStatistic;
use App\Filament\Resources\Statistics\Pages\EditStatistic;
use App\Filament\Resources\Statistics\Pages\ListStatistics;
use App\Filament\Resources\Statistics\Pages\ViewStatistic;
use App\Filament\Resources\Statistics\Schemas\StatisticForm;
use App\Filament\Resources\Statistics\Schemas\StatisticInfolist;
use App\Filament\Resources\Statistics\Tables\StatisticsTable;
use App\Models\Statistic;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StatisticResource extends Resource
{
    protected static ?string $model = Statistic::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;

    protected static ?string $navigationLabel = 'Statistik Desa';

    protected static ?string $modelLabel = 'Statistik Desa';

    protected static ?string $pluralModelLabel = 'Statistik Desa';

    protected static string|UnitEnum|null $navigationGroup = 'Konten Desa';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return StatisticForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StatisticInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StatisticsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStatistics::route('/'),
            'create' => CreateStatistic::route('/create'),
            'view' => ViewStatistic::route('/{record}'),
            'edit' => EditStatistic::route('/{record}/edit'),
        ];
    }
}
