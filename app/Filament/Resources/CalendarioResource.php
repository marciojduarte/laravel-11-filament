<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CalendarioResource\Pages;
use App\Filament\Resources\CalendarioResource\RelationManagers;
use App\Models\Calendario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CalendarioResource extends Resource
{
    protected static ?string $model = Calendario::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Calendarios';
    protected static ?string $pluralLabel = 'Calendários';
    protected static ?string $label = 'Calendário';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('data')
                    ->required()
                    ->label('Data'),
                Forms\Components\TextInput::make('limite')
                    ->label('Limite')
                    ->numeric()
                    ->nullable(),
                Forms\Components\Select::make('convenio_id')
                    ->label('Convênio')
                    ->relationship('convenio', 'nome')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('data')->label('Data')->date(),
                Tables\Columns\TextColumn::make('limite')->label('Limite'),
                Tables\Columns\TextColumn::make('convenio.nome')->label('Convênio'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCalendarios::route('/'),
            'create' => Pages\CreateCalendario::route('/create'),
            'edit' => Pages\EditCalendario::route('/{record}/edit'),
        ];
    }
}
