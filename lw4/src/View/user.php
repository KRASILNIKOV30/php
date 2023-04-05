<div class="user-content">
    <h2>
        <span><?=htmlentities($user->getLastName())?></span>
        <span><?=htmlentities($user->getFirstName())?></span>
        <span><?=htmlentities($user->getMiddleName())?></span>
    </h2>
    <p>Пол: <?=htmlentities($user->getGender())?></p>
    <p>Дата рождения: <?=htmlentities($user->getBirthDate())?></p>
    <p>email: <?=htmlentities($user->getEmail())?></p>
    <p>Телефон: <?=htmlentities($user->getPhone())?></p>
    <p>Путь до аватара: <?=htmlentities($user->getAvatarPath()) ?: "отсутствует"?></p>
</div>
