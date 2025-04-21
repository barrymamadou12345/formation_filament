<x-filament-widgets::widget>

    <style>
        .profs {
            color: orange;
            font-size: 40px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0;
            background-color: #444;
            border: 3px solid greenyellow;
            border-radius: 15px;
        }

        .titre {
            font-size: 18px;
        }
    </style>

    <x-filament::section>
        <h1 class="font-bold" style="color:orange; font-size:20px; padding-bottom:7px;">Widget personnalisé</h1>
        <p class="titre">Le nombre total de professeurs</p>

        <p class="profs">{{ $this->getUsers()['profs'] }}</p>

        <p class="titre">Le nombre total d'étudiants</p>

        <p class="profs">{{ $this->getUsers()['etudiants'] }}</p>
    </x-filament::section>
</x-filament-widgets::widget>