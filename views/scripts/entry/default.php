<?php $this->layout()->setLayout('layout') ?>
<div class="container blog blog-list">
    <div class="row">
        <div class="span9">

            <h1>
            <?php if ($this->category): ?>
                <?= $this->category->getName() ?>
            <?php else: ?>
                <?= $this->input('page-header') ?>
            <?php endif; ?>
            </h1>

            <?= $this->paginator ?>

            <?php foreach ($this->paginator as $entry): $entry instanceof Blog_Entry; ?>

            <h2>
                <a href="<?=$this->url(array(
                    'key' => $entry->getUrlPath()
                ), 'blog-show', false, false)?>"
                ><?=$entry->getTitle()?></a>
            </h2>
            <small><?=$entry->getDate()->toString('FFFFF');?></small>

            <div class="content">
                <p>
                    <?=(trim($entry->getSummary()))
                        ? $entry->getSummary()
                        : Website_Tool_Text::cutStringRespectingWhitespace(trim(strip_tags($entry->getContent())), 200)?>
                </p>
            </div>

            <?php if (count($entry->getTags())): ?>
            <div class="tags">

            <?php foreach ($entry->getTags() as $tag): ?>
            <a href="<?=$this->url(array(
                'tag' => $tag['url'],
                'page' => null, 'perpage' => null
            ), 'blog-tag')?>"
            ><?= $tag['tag'] ?></a>
            <?php endforeach; ?>

            </div>
            <?php endif; ?>

            <?php endforeach; ?>

            <?= $this->paginator ?>

        </div>
        <div class="span3">
            <?php for($i = 1; $i <= 3; $i++): ?>
                <?=$this->snippet("blog-snippet-$i")?>
            <?php endfor; ?>
        </div>
    </div>
</div>
