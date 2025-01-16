<?php

namespace App\Livewire;

use App\Models\Rdv;
use Livewire\Component;
use Filament\Tables\Table;
use Filament\Actions\ActionGroup;
use Filament\Tables\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ListRdv extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Rdv::query()->orderBy('created_at', 'desc'))
            // ->paginated(false)
            ->columns([
                TextColumn::make('date_rdv')
                    ->label('Date RDV')
                    ->searchable()
                    ->date('d-m-Y')
                    ->sortable(),

                TextColumn::make('heure_rdv')
                    ->label('Heure RDV')
                    ->searchable(),

                TextColumn::make('agence')
                    ->label('Agence')
                    ->searchable(),

                TextColumn::make('souscription.nom_prenom_souscripteur')
                    ->label('Souscripteur')
                    ->searchable(),

                TextColumn::make('souscription.phone_souscripteur')
                    ->label('Téléphone')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->searchable()
                    ->sortable()
                    ->dateTime('d-m-Y à H\hi')
                    ->dateTimeTooltip()
                    ->label("Date création"),
            ])
            ->filters([
                
            ])
            ->actions([])
            ->bulkActions([]);
    }

    public function render()
    {
        return view('livewire.list-rdv');
    }
}
