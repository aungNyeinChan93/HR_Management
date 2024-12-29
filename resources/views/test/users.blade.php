<x-master>
    <x-slot:titl>
        test user
    </x-slot:titl>

    <div class="container">
        <x-header>
            Test User
        </x-header>

        <div class="wrapper">
            <div class="row">
                <div class="col-12 mx-4">
                    <ul>
                        <?php foreach($users as $user):?>
                            <li><?= $user ?></li>
                        <?php endforeach :?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-master>
