<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use App\Models\Driver;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('plate')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('driver_id')
                    ->relationship('driver')
                    ->getOptionLabelFromRecordUsing(fn (Driver $record) => "{$record->first_name} {$record->last_name}"),
                Forms\Components\Select::make('comfort_category_id')
                    ->relationship('comfort_category', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('plate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('driver_id')
                    ->label('Driver Name')
                    ->formatStateUsing(fn ($record) => $record->driver->first_name . ' ' . $record->driver->last_name)
                    ->sortable(),
                Tables\Columns\TextColumn::make('comfort_category_id')
                    ->label('Car comfort')
                    ->formatStateUsing(fn ($record) => $record->comfort_category->name)
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
