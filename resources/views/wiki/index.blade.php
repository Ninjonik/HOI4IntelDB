@include('wiki.layout.header', ['title' => 'Wiki'])
<div class="uk-section uk-section-muted">
    <div class="uk-container">
        <div class="uk-child-width-1-2@m uk-grid-match- uk-grid-small" data-uk-grid>
            @foreach($data as $unit)
                <div>
                    <div class="uk-card uk-card uk-card-default uk-card-hover uk-card-body uk-inline uk-border-rounded" style="width: 100%;">
                        <a class="uk-position-cover" href="{{ route('wiki.category', ['id' => $unit->id, 'title' => str_replace(' ', '-', $unit->title)]) }}"></a>

                        <div class="uk-grid-small" data-uk-grid>
                            <div class="uk-width-auto uk-text-primary uk-flex uk-flex-middle">
                                <span class="uk-margin-xsmall-top" data-uk-icon="icon: {{ $unit->icon }}; ratio: 2.6"></span>
                            </div>
                            <div class="uk-width-expand">
                                <h3 class="uk-card-title uk-margin-remove uk-text-primary">{{ $unit->title }}</h3>
                                <p class="uk-text-muted uk-margin-remove">{{ $unit->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="uk-section uk-section-muted">
    <div class="uk-container uk-container-small">
        <h2 class="uk-text-center">Frequently asked questions</h2>
        <ul class="uk-margin-medium-top" data-uk-accordion="multiple: true">
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">Do you provide customer support?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>At HOI4Intel, we do provide customer support to help you with any issues you may encounter while using our hosting bot. We offer support through our Discord server where you can get in touch with our team and receive the assistance you need.</p>
                    <h4>Who has the right for support?</h4>
                    <p>We provide support to all HOI4 servers who host games more than 2 times a week / are in partnership with HOI4Intel / have reached more than 1000 members.</p>
                    <h4>What's included in item support?</h4>
                    <p>Our support team is here to help you with the following:</p>
                    <ul>
                        <li>Answering any questions you have about how to use the bot.</li>
                        <li>Answering technical questions about the bot and any included third-party assets.</li>
                        <li>Helping you with any defects in the bot or third-party assets.</li>
                        <li>Providing updates to ensure the bot remains compatible and protected against security vulnerabilities.</li>
                        <li>Included version updates for all items.</li>
                    </ul>
                    <h4>What's not included in item support?</h4>
                    <p>Please note that item support does not include services to modify or extend the bot beyond the original features, style, and functionality described on the bot page. If you require customization services, we recommend contacting us to see if we offer paid customization services.</p>
                    <ul>
                        <li>Installation of the bot on your own server.</li>
                        <li>Hosting, server environment, or software.</li>
                        <li>Help from authors of included third-party assets.</li>
                    </ul>
                    <h4>Contacting support</h4>
                    <a target="_blank" href="https://discord.gg/world-war-community-820918304176340992"><p>Our support team is available from Monday to Friday through our item discord server. If you need any help, please don't hesitate to get in touch!</p></a>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">What is HOI4?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>HOI4 stands for Hearts of Iron IV, a grand strategy computer wargame developed by Paradox Development Studio and published by Paradox Interactive. It is the sequel to 2009’s Hearts of Iron III and the fourth main installment in the Hearts of Iron series. The game allows players to take control of any nation in the world during the period of 1936-1948 and lead it to victory or defeat in World War II.</p>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">What is HOI4Intel?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>HOI4Intel is a Discord bot made by and for the HOI4 community. It offers a bunch of features and services to enhance your HOI4 experience, such as rating system, steam verification, event system, and more. It also provides useful information and tips about the game, such as country guides, focus trees, achievements, etc.</p>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">How can I use HOI4Intel?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>To use HOI4Intel, you need to invite it to your Discord server and give it the necessary permissions. You can find the invite link on our website or by typing !invite in any channel where the bot is present. Once the bot is in your server, you can use its commands by typing ! followed by the command name and arguments. For example, !help will show you a list of available commands and how to use them.</p>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">What are the benefits of using HOI4Intel?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>Using HOI4Intel can make your HOI4 sessions more fun, organized, and secure. You can use the rating system to filter out unqualified or unwanted players from joining your games, or to reward good players with higher ratings. You can use the steam verification to prevent multi-accounters from bypassing your bans or restrictions. You can use the event system to easily plan and announce your upcoming games, set requirements for reservations, and remind participants of the game time. You can also use the bot to access various information and tips about the game, such as country guides, focus trees, achievements, etc.</p>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">How does the rating system work?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>The rating system is a feature that allows hosts to set minimum or maximum ratings for players who want to join their games. Ratings are numerical values that represent how good or bad a player is at HOI4. Ratings are calculated based on various factors, such as win/loss ratio, number of games played, number of reports received, etc. Ratings can also be manually adjusted by hosts or admins if needed. Ratings are visible to everyone on the bot’s profile page or by typing !rating in any channel where the bot is present.</p>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">How does the steam verification work?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>The steam verification is a feature that allows hosts to require players to link their steam accounts to their discord accounts before joining their games. This is done to prevent multi-accounters from using different steam accounts to bypass bans or restrictions. Steam verification also allows hosts to check the steam profiles of players who join their games, such as their hours played, achievements unlocked, etc. Steam verification can be enabled or disabled by hosts or admins using the !steam command.</p>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">How does the event system work?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>The event system is a feature that allows hosts to create and manage events for their upcoming games. Events are posts that contain information about the game, such as date, time, rules, mods, etc. Events can also have requirements for players who want to reserve a spot in the game, such as minimum rating, steam verification, etc. Events can be created using the !event command and edited or deleted using the !edit or !delete commands. Events can also be announced in a designated channel using the !announce command. Players can reserve a spot in an event by reacting with an emoji or typing !reserve in the event channel. The bot will then assign them a role and a country according to their preferences. The bot will also send reminders to participants before the game starts.</p>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">What are some of the other features of HOI4Intel?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>HOI4Intel has many other features that can enhance your HOI4 experience, such as:</p>
                    <ul>
                        <li>Country guides: You can use the !guide command to access detailed guides for various countries in HOI4, such as their focus trees, strategies, tips, etc.</li>
                        <li>Focus trees: You can use the !focus command to view the focus trees of any country in HOI4, including modded ones.</li>
                        <li>Achievements: You can use the !achievement command to view the list of achievements in HOI4 and how to unlock them.</li>
                        <li>Tips: You can use the !tip command to get random tips and tricks about HOI4.</li>
                        <li>Stats: You can use the !stats command to view various statistics about your HOI4 games, such as number of games played, win/loss ratio, average rating, etc.</li>
                        <li>Leaderboard: You can use the !leaderboard command to view the ranking of players based on their ratings.</li>
                        <li>Report: You can use the !report command to report players who break the rules or behave badly in your games.</li>
                        <li>Feedback: You can use the !feedback command to send us your suggestions or bug reports about the bot.</li>
                    </ul>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">How can I support HOI4Intel?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>We appreciate your support for HOI4Intel and we hope you enjoy using it. If you want to support us further, you can do so by:</p>
                    <ul>
                        <li>Inviting more people to use our bot and spreading the word about it.</li>
                        <li>Giving us feedback and suggestions on how to improve our bot.</li>
                        <li>Donating to us via PayPal or Patreon to help us cover our hosting and development costs.</li>
                    </ul>
                    <p>You can find our donation links on our website or by typing !donate in any channel where the bot is present.</p>
                </div>
            </li>
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">How can I contact you?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>If you have any questions, issues, or feedback about our bot, you can contact us anytime at our official support server. You can join our server by clicking on this link: <a target="_blank" href="https://discord.gg/world-war-community-820918304176340992">https://discord.gg/world-war-community-820918304176340992</a>. You can also reach us by email at hoi4intel@gmail.com.</p>
                </div>
            </li>


            <!--
            <li>
                <a class="uk-accordion-title uk-box-shadow-hover-small" href="#">Are updates and bug fixes included in
                    the cost of the item?</a>
                <div class="uk-article-content uk-accordion-content link-primary">
                    <p>Regardless of whether you have support or not:</p>
                    <ul>
                        <li>When we release an update, it will be available for you to download for free</li>
                        <li>You can report bugs</li>
                        <li>You can expect us to keep the item in good working order, working as described and protected
                            against major security issues</li>
                    </ul>
                </div>
            </li>
            -->
        </ul>
    </div>
</div>

<div class="uk-section uk-section-muted">
    <div class="uk-container">
        <h2 class="uk-text-center">Didn't find an answer?</h2>
        <p class="uk-text-muted uk-text-center uk-text-lead">Our team is just a message away and ready to answer
            your questions</p>
        <div class="uk-margin-medium-top uk-flex-center uk-text-center uk-margin-medium-top uk-grid-small" data-uk-grid>
            <div>
                <div class="uk-card">
                    <img class="uk-avatar uk-border-circle" src="https://cdn.discordapp.com/avatars/231105080961531905/5cb3b799965cec055a4716a7a426493b.png?size=1024" alt="Ninjonik" />
                    <h5 class="uk-margin-remove-bottom uk-margin-small-top">Ninjonik</h5>
                    <p class="uk-article-meta uk-margin-xsmall-top">Discord Bot and Web Developer</p>
                </div>
            </div>
            <div>
                <div class="uk-card">
                    <img class="uk-avatar uk-border-circle" src="https://cdn.discordapp.com/avatars/718559880419475467/70fee7383c07e98e45b5ead159e9544c.png?size=1024" alt="Nullingo" />
                    <h5 class="uk-margin-remove-bottom uk-margin-small-top">Nullingo</h5>
                    <p class="uk-article-meta uk-margin-xsmall-top">Community Management and Partnerships</p>
                </div>
            </div><div>
                <div class="uk-card">
                    <img class="uk-avatar uk-border-circle" src="https://cdn.discordapp.com/avatars/326789382101008396/fb556eb67e3d233b3fba438cc837a25d.png?size=1024" alt="Nullingo" />
                    <h5 class="uk-margin-remove-bottom uk-margin-small-top">DragonMan</h5>
                    <p class="uk-article-meta uk-margin-xsmall-top">Quality Assurance & Web Developer</p>
                </div>
            </div>
        </div>
        <div class="uk-margin-medium-top uk-text-center"
             data-uk-scrollspy="cls: uk-animation-slide-bottom-medium; repeat: true">
            <a class="uk-button uk-button-primary uk-border-rounded" target="_blank" href="https://discord.gg/world-war-community-820918304176340992">Contact Us</a>
        </div>
    </div>
</div>

<div id="offcanvas-docs" data-uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" data-uk-close></button>
        <h5 class="uk-margin-top">Getting Started</h5>
        <ul class="uk-nav uk-nav-default doc-nav">
            <li class="uk-active"><a href="article.html">Template setup</a></li>
            <li><a href="article.html">Basic theme setup</a></li>
            <li><a href="article.html">Navigation bar</a></li>
            <li><a href="article.html">Footer options</a></li>
            <li><a href="article.html">Creating your first post</a></li>
            <li><a href="article.html">Creating docs posts</a></li>
            <li><a href="article.html">Enabling comments</a></li>
            <li><a href="article.html">Google Analytics</a></li>
        </ul>
        <h5 class="uk-margin-top">Product Features</h5>
        <ul class="uk-nav uk-nav-default doc-nav">
            <li><a href="article.html">Hero page header</a></li>
            <li><a href="article.html">Category boxes section</a></li>
            <li><a href="article.html">Fearured docs section</a></li>
            <li><a href="article.html">Video lightbox boxes section</a></li>
            <li><a href="article.html">Frequently asked questions section</a></li>
            <li><a href="article.html">Team members section</a></li>
            <li><a href="article.html">Call to action section</a></li>
            <li><a href="article.html">Creating a changelog</a></li>
            <li><a href="article.html">Contact form</a></li>
            <li><a href="article.html">Adding media to post and doc content</a></li>
            <li><a href="article.html">Adding table of contents to docs</a></li>
            <li><a href="article.html">Adding alerts to content</a></li>
        </ul>
        <h5 class="uk-margin-top">Customization</h5>
        <ul class="uk-nav uk-nav-default doc-nav">
            <li><a href="article.html">Translation</a></li>
            <li><a href="article.html">Customization</a></li>
            <li><a href="article.html">Development</a></li>
            <li><a href="article.html">Sources and credits</a></li>
        </ul>
        <h5 class="uk-margin-top">Help</h5>
        <ul class="uk-nav uk-nav-default doc-nav">
            <li><a href="article.html">Contacting support</a></li>
        </ul>
    </div>
</div>

@include('wiki.layout.footer')
