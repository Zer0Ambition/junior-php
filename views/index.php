<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?= $pageData['title'] ?></title>
    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="dns-prefetch" href="//maps.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">


        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,700,800&display=swap">
        <link rel="stylesheet" href="<?= $pageData['htmlRoot'] ?>/css/main-76b66b5da2.css">

</head>
<body>
    <div class="wrap">
        <nav class="menu">
            <span class="menu__label">
                Сортировка:
            </span>
            <ul class="menu__list">
                <li>
                    <a href="?orderBy=price&order=asc" class="link menu__link">
                        По цене ▲
                    </a>
                </li>
                <li>
                    <a href="?orderBy=price&order=desc" class="link menu__link is-active">
                        По цене ▼
                    </a>
                </li>
                <li>
                    <a href="?orderBy=author&order=asc" class="link menu__link">
                        По автору ▲
                    </a>
                </li>
                <li>
                    <a href="?orderBy=author&order=desc" class="link menu__link">
                        По автору ▼
                    </a>
                </li>
            </ul>
        </nav>

    <h1 class="v-hidden">
        Книги
    </h1>
    <div class="items">

    <? foreach ($pageData['books'] as $book) { ?>
            <article class="entry">
                <header class="entry__header">
                    <h2 class="heading-2 entry__title">
                        <?= $book['name'] ?>
                    </h2>
                    <div class="entry__meta">
                        <span>
                            <?= $book['author'] ?>
                        </span>
                        <span>
                            <?= $book['publication_date'] ?>
                        </span>
                        <span>
                            <?= $book['genre'] ?>
                        </span>
                    </div>
                </header>
                <div class="entry__main">
                    <div class="entry__image">
                        <img src="<?= $pageData['htmlRoot'] ?>/img/books/<?=$book['image']?>" alt="<?= $book['name'] ?>">
                    </div>
                    <div>
                        <div class="entry__desc">
                            <p>
                                <?= preg_replace('/\s+?(\S+)?$/', '', substr($book['description'], 0, 201)) ?>
                                <?= strlen($book['description']) > 200 ? '...' : '' ?>
                            </p>
                        </div>
                        <? if (strlen($book['description']) > 200) { ?>
                        <a href="#" class="link">
                            Полное описание
                        </a>
                        <? } ?>
                        <div class="entry__bar">
                            <div class="entry__price">
                                <span>
                                    <?= $book['price'] ?>
                                </span>
                                <span>
                                    21.52 €
                                </span>
                            </div>
                            <button type="button" class="button button_dark">
                                Купить
                            </button>
                        </div>
                    </div>
                </div>
            </article>
        <? } ?>

    </div>

        <dl class="meta">
            <div class="meta__item">
                <dt>
                    Всего книг:
                </dt>
                <dd>
                   <?= $pageData['booksCount'] ?>
                </dd>
            </div>
            <div class="meta__item">
                <dt>
                    Средняя стоимость:
                </dt>
                <dd>
                    <?= $pageData['averagePrice'] ?>
                </dd>
            </div>
            <div class="meta__item">
                <dt>
                    Публикации:
                </dt>
                <dd>
                    <?= $pageData['oldestPublicationYear'] . ' - ' . $pageData['newestPublicationYear'] ?>
                </dd>
            </div>
        </dl>
        <form class="form">
            <input type="hidden" name="date" value="02.02.2020">
            <button type="submit" class="button">
                Создать PDF
            </button>
        </form>
    </div>
    <script src="<?= $pageData['htmlRoot'] ?>/js/script.js"></script>
</body>
</html>