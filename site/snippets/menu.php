

</nav>


            <nav role="navigation">

                <ul class=" ">

                    <?php foreach ($pages->visible() as $p): ?>
                        <li>
                            <!--isopen: -->

                            <a <?php e($p->isOpen(), ' class="active"') ?>
                                href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>

                            <?php if ($p->hasVisibleChildren()): ?>

                                <ul class="submenu">
                                    <?php foreach ($p->children()->visible() as $c): ?>
                                        <li>
                                            <a href="<?php echo $c->url() ?>"><?php echo $c->title()->html() ?></a>
                                        </li>


                                    <?php endforeach ?>
                                </ul>
                            <?php endif ?>

                        </li>
                    <?php endforeach ?>
                </ul>


