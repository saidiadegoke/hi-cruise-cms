<?php
namespace App\Common;

use App\Models\Page;

class Utility
{
	public static function getValue($slug) {
    	$page = Page::where(['field' => $slug])->first();
    	if($page) {
    		return $page->value;
    	}
    	return '';
    }

	public static function allCategories() {
		return [
			[
				'id' => 1,
				'name' => 'Entertainment',
				'slug' => 'entertainment',
				'cover' => '',
				'cover_type' => 'image',

			],
			[
				'id' => 5,
				'name' => 'Movies',
				'slug' => 'movies',
				'cover' => '',
				'cover_type' => 'image',
				
			],
			[
				'id' => 6,
				'name' => 'Sports',
				'slug' => 'sports',
				'cover' => '100-greatest-footballers-3.jpg',
				'cover_type' => 'image',
				
			],
			[
				'id' => 2,
				'name' => 'Shows',
				'slug' => 'shows',
				'cover' => '',
				'cover_type' => 'image',
				
			],
			[
				'id' => 3,
				'name' => 'Hi-Impact Originals',
				'slug' => 'hi-impact-originals',
				'cover' => '',
				'cover_type' => 'image',
				
			],
			[
				'id' => 4,
				'name' => 'Telenovelas',
				'slug' => 'telenovelas',
				'cover' => '',
				'cover_type' => 'image',
				
			],
			[
				'id' => 7,
				'name' => 'News',
				'slug' => 'news',
				'cover' => 'no-image.jpg',
				'cover_type' => 'image',
				
			],
			[
				'id' => 8,
				'name' => 'Special Live Coverage',
				'slug' => 'hi-impact-specials',
				'cover' => 'no-image.jpg',
				'cover_type' => 'image',
			]
		];
	}

	public static function programmes() { // https://www.youtube.com/embed/judmiOhG9xI
		return [
			[
				'id' => 1,
				'name' => 'X Factor',
				'synopsis' => 'The X Factor UK is UK’s biggest reality television music competition, discovering the freshest singing talent around. Expect knockout vocals, big personalities and stand-out stage presence as the auditionees sing for the show’s judges in the hope of securing a life-changing record contract. Should they impress and secure three or more ‘yeses’, they’re given the chance to progress to boot camp to see if they have what it takes for international stardom. Anticipate entertainment at its peak as we bring to you the most recent season of the show.',
				'cover' => 'x-factor.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/h0DG4iKngqU',
				'slug' => 'x-factor',
				'cat_slug' => 'entertainment',
				'cat_id' => 1
			],
			[
				'id' => 2,
				'name' => 'America\'s Got Talent',
				'synopsis' => 'The talent show with NO age limit, NO talent restrictions and NO cultural boundaries. The series is a true celebration of creativity and talent, featuring a colorful array of singers, dancers, comedians, contortionists, impressionists, jugglers, magicians, ventriloquists and  many other hopeful stars, all vying to win America’s hearts and the $1 million prize. The Judges are Simon Cowell, Mel B, Heidi Klum, Howie Mandel and AGT host, Tyra Banks.',
				'cover' => 'americas-got-talent.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/jsUx0EPsxK0',
				'slug' => 'americas-got-talent',
				'cat_slug' => 'entertainment',
				'cat_id' => 1
			],
			[
				'id' => 3,
				'name' => 'Fans Corner',
				'synopsis' => 'A Sport Programme for Football Fans who represent their clubs and have fun doing it. Also includes football reviews and analysis of games of the week.',
				'cover' => 'fans-corner.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/QRAKOQDML34',
				'slug' => 'fans-corner',
				'cat_slug' => 'entertainment',
				'cat_id' => 1
			],
			[
				'id' => 4,
				'name' => 'Tea or Coffee',
				'synopsis' => 'Tea or Coffee is a 3-hour breakfast magazine show with various segments on social issues, business, what is new in technology, trade reports, news, education, health-care and fitness, entertainment and information on all you need to set off your day for a great start.',
				'cover' => 'tea-or-coffee.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/rRCAKt7SPD4',
				'slug' => 'tea-or-coffee',
				'cat_slug' => 'shows',
				'cat_id' => 2
			],
			/*[
				'id' => 5,
				'name' => 'Media Lounge',
				'synopsis' => 'Media Lounge is a 30-minute health and wellness programme that gives an in-depth insight and useful information on salient health issues with health professionals, remedial exercises and healthy breakfast recipes that help keep your health in check.',
				'cover' => 'no-image.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/judmiOhG9xI',
				'slug' => 'media-lounge',
				'cat_slug' => 'shows',
				'cat_id' => 2
			], */
			[
				'id' => 6,
				'name' => 'Legends',
				'synopsis' => 'Legends takes you on a journey through the life and achievements by people of African descent, sharing their inspiring stories, notable impacts to effect positive change in the world and passing a legacy that lives on from one generation to the next. It is the celebratory stories of real-life heroes.',
				'cover' => 'legends-1.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/JdujFnwQZQo',
				'slug' => 'legends',
				'cat_slug' => 'shows',
				'cat_id' => 2
			],
			[
				'id' => 7,
				'name' => 'Mid-Day Special',
				'synopsis' => 'Mid-Day Special is a fun-packed lunch hour entertainment show, geared towards bringing to the screen of viewers juicy scoops in the world of entertainment, from trending music, to movies, and everything in-between. If it’s buzzing the entertainment world, it’s on Mid-Day Special.',
				'cover' => 'mid-day-special.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/78MeidxluJs',
				'slug' => 'mid-day-special',
				'cat_slug' => 'shows',
				'cat_id' => 2
			],
			/*[
				'id' => 8,
				'name' => '100 Greatest Footballers',
				'synopsis' => '100 Greatest Footballers pays tribute to the greatest footballers and provides great value and flexibility for all broadcasters as well as being perfect for all schedules.
100 Greatest Footballers – the greatest footballers of all time
',
				'cover' => '100-greatest-footballers-1.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/judmiOhG9xI',
				'slug' => 'mid-day-special',
				'cat_slug' => 'sports',
				'cat_id' => 6
			], */
			[
				'id' => 9,
				'name' => 'A Perfect Man',
				'synopsis' => 'An unfaithful husband (Liev Schreiber) falls back in love with his wife (Jeanne Tripplehorn) over the phone when she pretends to be someone else.',
				'cover' => 'a-perfect-man.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/3kzVL1JvNN8',
				'slug' => 'a-perfect-man',
				'cat_slug' => 'movies',
				'cat_id' => 5
			],
			[
				'id' => 10,
				'name' => 'Another Time',
				'synopsis' => 'Eric, a highly intelligent man with a knack for math and science, grew up in poverty and vowed to never be poor again. He uses his gifts not for the good of mankind, but to amass wealth that he ironically never spends. <br<br>

He falls in love with Julia, but after a stolen kiss discovers she is happily engaged. With some oddly spot-on advice from his whacky friend Kal, Eric makes several attempts to win Julia over, all to no avail. After meeting her handsome and friendly fiancé, Adam, Eric realizes he has no shot of ever being with Julia. At least not in this timeline. 
',
				'cover' => 'another-time.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/40WNyEOorJ4',
				'slug' => 'another-time',
				'cat_slug' => 'movies',
				'cat_id' => 5
			],
			[
				'id' => 11,
				'name' => 'Dreams I Never Had',
				'synopsis' => 'LAYLA is a 14-year-old girl working 12-16 hours per day, 7 days a week for a wealthy family headed by businessman SAM SAHAL in Southern California.  She speaks no English.  She does not attend school. She does not leave the family\'s property and rarely spends time out of the house.  Her existence is a secret to the outside world.  <br><br>
Layla is ultimately removed from the SAHAL\'s home and placed with a loving foster family, the IBRAHIMS.  She is finally able to enroll in school, learn English, and become a "normal" teenager.  The story concludes with Layla at age 18, awarded more than $150,000 in restitution in a court case against the SAHALS.  She is reunited with Emilio when he returns to the country at age 18 with a student VISA.
',
				'cover' => 'dreams-i-never-dad-1.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/KNzkpEuGAeU',
				'slug' => 'dreams-i-never-had',
				'cat_slug' => 'movies',
				'cat_id' => 5
			],
			[
				'id' => 12,
				'name' => 'National Icons',
				'synopsis' => 'The ultimate battle for supremacy! Our biggest selling title – a proven ratings winner, entertaining, engaging and endless scheduling options. The biggest names in sport take on the greatest legends – head to head. Messi vs Maradona, Nadal vs Agassi, LeBron vs Jordan… the list goes on – all sports, all nations, all awesome!',
				'cover' => 'national-icons-2.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/lK4rsmbrncQ',
				'slug' => 'national-icons',
				'cat_slug' => 'sports',
				'cat_id' => 6
			],
			[
				'id' => 13,
				'name' => 'The Immortals',
				'synopsis' => 'A beautifully crafted series that celebrates the careers of the greatest players and athletes of all time.<br><br>
A follow-up to the highly successful series ‘Perfection’ which explored the greatest moments in sport, ‘The Immortals’ is an all
new series focusing on the careers of our true champions - the greatest sportsmen and women of all time.<br><br>
The Immortals is a premium documentary/biographical series that is rich in quality and high profile champions of sport that will
appeal to all fans of sport the world over.
',
				'cover' => 'the-immortals-3.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/dK-9qWq-ufQ',
				'slug' => 'the-immortals',
				'cat_slug' => 'sports',
				'cat_id' => 6
			],
			[
				'id' => 14,
				'name' => 'Underdogs',
				'synopsis' => 'A gruff losers to rise above their station in both football and life, bringing pride to themselves and their community.',
				'cover' => 'national-icons.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/N1yrcAzVuoc',
				'slug' => 'national-icons',
				'cat_slug' => 'movies',
				'cat_id' => 5
			],
			[
				'id' => 15,
				'name' => 'Bedroom Points',
				'synopsis' => 'A married woman shows her friends a system of avoiding being intimate with their husbands known as the Bedroom Points. As an attractive woman from her husband\'s past shows up and her marriage starts to devolve. The woman must then choose between the bedroom points and her husband, or risk losing everything to the only real threat she has ever faced.',
				'cover' => 'bedroom-point-2.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/BI8Ufw7C0hY',
				'slug' => 'bedroom-points',
				'cat_slug' => 'hi-impact-originals',
				'cat_id' => 3
			],
			[
				'id' => 16,
				'name' => 'Like Dominoes',
				'synopsis' => 'Like Dominoes is a typical family movie that revolves around the Brown\'s family. Mr Brown dies and leaves his wife and seventeen year old son with fortune. While grieving, Mrs Brown accidentally falls off the stairs and loses her memory. Oladimeji, Mr Brown\'s brother, a re-known Con man sees this as an opportunity and tries everything within his reach to exploit the family.  Watch how the story unfold on Hi-Impact TV.',
				'cover' => 'like-dominoes-3.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/jv3gdYSfeVk',
				'slug' => 'like-dominoes',
				'cat_slug' => 'hi-impact-originals',
				'cat_id' => 3
			],
			[
				'id' => 17,
				'name' => 'For Priye',
				'synopsis' => 'A knock on the door disrupts a man\'s life and family while he struggles with the thought of loosing his wife to an unknown ailment.',
				'cover' => 'tv_priye.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/o8xxD7wyIPA',
				'slug' => 'for-priye',
				'cat_slug' => 'hi-impact-originals',
				'cat_id' => 3
			],
			[
				'id' => 18,
				'name' => 'Shelter',
				'synopsis' => 'A smart, proud and often bullied high school boy battles to save himself and his ever reluctant mother from the constant and potentially fatal abuse of his insecure father.',
				'cover' => 'shelter.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/hAsroCWPBDw',
				'slug' => 'shelter',
				'cat_slug' => 'hi-impact-originals',
				'cat_id' => 3
			],
			[
				'id' => 19,
				'name' => 'Pasion Morena',
				'synopsis' => 'Morena a young fashion designer has taken New York’s runway by storm. She is soon to marry Oscar the man of her dreams but her hopes are shattered after she finds him cheating with another woman. The pain forces Morena to leave the city for paradise island where her story took a turn after she meets Leo. ',
				'cover' => 'pasion-morena.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/W_7s6Czv5yk',
				'slug' => 'pasion-morena',
				'cat_slug' => 'telenovelas',
				'cat_id' => 4
			],
			[
				'id' => 20,
				'name' => 'So Much Love',
				'synopsis' => 'Exclusive to the station is the new telenovela, "So Much Love". This programme tells the story of 3 young girls, sisters who have different aspirations and a young man, Alberto who recently returns from Spain after the unexpected death of his grandfather, Don Oscar.',
				'cover' => 'so-much-love.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/X-MVWpyojxg',
				'slug' => 'so-much-love',
				'cat_slug' => 'telenovelas',
				'cat_id' => 4
			],
			[
				'id' => 21,
				'name' => 'Catch Phrase',
				'synopsis' => 'Catch Phrase is a British game show presented by Stephen Mulhern,
Four contestants, start the show and would have to identify the familiar phrase represented by a piece of animation accompanied by background music. The show\'s mascot, a golden robot called \"Mr. Chips\", appears in many of the animations. In the revived version of the show, the same format remains, but there are three contestants and there is no particular attention paid to gender.<br><br>
There are usually 15 numbered squares in the form of a pyramid (with 15 at the top) with each row, starting at the bottom, being worth a higher amount of money (£2,500/£5,000/£10,000/£25,000/£50,000). Number 11 in the middle was starred and correctly answering it awarded a bonus prize, which is usually a luxury holiday. In the celebrity specials, correctly answering this Catch Phrase doubles the amount of money won by the other two celebrities for their chosen charities.
',
				'cover' => 'catch-phrase.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/_8F0WrPLqV8',
				'slug' => 'catch-phrase',
				'cat_slug' => 'entertainment',
				'cat_id' => 1
			],
			[
				'id' => 22,
				'name' => 'Hole in the Wall',
				'synopsis' => 'Hole in the Wall is an American game show in which players must contort themselves to fit through cutouts in a large 13 feet Styrofoam wall moving towards them on a 50 feet track.
Two teams of three people play, with a hobby, occupation or location as the team name. Two lifeguards, one male and one female, sit poolside. The contestants are dressed in the silver spandex zentai unitards and wear red or blue helmets, elbow pads, and knee pads depending on the team color.<br><br>
A replay is shown after each wall has passed whether cleared or not. If a wall is not cleared, a diagram is shown of the best method.<br><br>
One rule that is almost automatically assumed is that contestants must jump through the hole without breaking it all off or falling in the water. The rule that most players inadvertently break is that at least one foot must be in the play area.
',
				'cover' => 'hole-in-the-wall-2.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/xVZwpST27mg',
				'slug' => 'hole-in-the-wall',
				'cat_slug' => 'entertainment',
				'cat_id' => 1
			],
			[
				'id' => 23,
				'name' => 'Match Game',
				'synopsis' => 'Match Game is an American television panel game show Hosted by Michael Strahan that features contestants attempting to match the answers of six celebrities in a game of fill-in-the-blank to win money.',
				'cover' => 'match-game.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/EAonuIK_whs',
				'slug' => 'match-game',
				'cat_slug' => 'entertainment',
				'cat_id' => 1
			],
			[
				'id' => 24,
				'name' => 'News around the world',
				'synopsis' => 'News around the world.',
				'cover' => 'no-image.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/IGXUzhG9du8',
				'slug' => 'news-around-the-world',
				'cat_slug' => 'news',
				'cat_id' => 7
			],
			[
				'id' => 25,
				'name' => 'Empire',
				'synopsis' => 'After getting renewed for a sixth season, fox announced on Monday that empire’s upcoming season will be its last.<br><br>
When asked if there were plans to bring Jussie Smollett back amid his legal problems, fox entertainment CEO Charlie Collier said the network has the option to include the actor in the show’s final season, “but there are no plans at this point.”
',
				'cover' => 'empire-season-5.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/judmiOhG9xI',
				'slug' => 'empire',
				'cat_slug' => 'news',
				'cat_id' => 7
			],
			[
				'id' => 26,
				'name' => 'SpaceX',
				'synopsis' => 'After high winds delayed the mission Wednesday, SpaceX has again decided to stand down to "update satellite software and triple-check everything again." the next launch opportunity will be in "about a week."',
				'cover' => 'space-x-elon.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/judmiOhG9xI',
				'slug' => 'space-x',
				'cat_slug' => 'news',
				'cat_id' => 7
			],
			[
				'id' => 27,
				'name' => 'When You\'re Mine',
				'synopsis' => 'Wealthy grandson and heir to the Sanchos Serrano Ranch, Diego falls in love with simple, beautiful Paloma, an employee on the ranch. This soap opera tells the story of long suffering in the love chase of Diego and Paloma.',
				'cover' => 'when-you-are-mine.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/BTwN0ZWRFN4',
				'slug' => 'when-you-are-mine',
				'cat_slug' => 'telenovelas',
				'cat_id' => 4
			],
			[
				'id' => 28,
				'name' => 'Adam and Eve',
				'synopsis' => 'Adam & Eve is the classic story of Romeo and Juliet, with a happy ending! Alex is a handsome timid schoolteacher in his mid-thirties. His traditional and domineering parents want him to marry a good Greek girl. <br><br>But Alex falls hopelessly in love with the gorgeous Eve, a lawyer, whose parents are Lebanese Muslim. The love-struck couple must confront then hide their affections for each other from the world knowing that their parents will never allow them to be together. <br><br>There are obstacles on the way, like Eve’s mother’s plan for an arranged marriage to Mohomad, Alex’s father’s threat to disinherit him if he continues to see Eve and Alex’s mother’s heart attack when she discovers that he has fallen in love with a Muslim woman.',
				'cover' => 'alex-n-eve.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/UU4JNFXw5Po',
				'slug' => 'adam-n-eve',
				'cat_slug' => 'movies',
				'cat_id' => 5
			],
			[
				'id' => 29,
				'name' => 'It had to be you',
				'synopsis' => '',
				'cover' => 'it-had-to-be-you.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/Cyi8oN4GxHU',
				'slug' => 'it-had-to-be-you',
				'cat_slug' => 'movies',
				'cat_id' => 5
			],
			[
				'id' => 30,
				'name' => 'Ten Inch Hero',
				'synopsis' => 'Aspiring artist PIPER JONES, 23, gets a job at the “By The Inch Sub Shop,” where the sign out front warns that “normal people need not apply.” The place is run by aging hippie surfer TRUCKER, 50s, and staffed by charming punk rocker PRIESTLY, 25, gorgeous TISH MATHESON, 22, and wallflower JEN MARSH. Tish is the type of girl who makes men walk into things and gets plenty of dates with a “little miss innocent” act. It’s obvious that Priestly has a crush on Tish. Jen’s dating is restricted to a yearlong Internet relationship with someone who goes by the handle FUZZY22. Trucker is infatuated with ZO, the Wiccan who runs the shop next door and seems to have her finger on whatever vibe is happening at the sub shop. Elderly MR. JULIUS is a sub shop regular.',
				'cover' => 'ten-inch-hero.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/KtiP0MriQpA',
				'slug' => 'ten-inch-hero',
				'cat_slug' => 'movies',
				'cat_id' => 5
			],
			[
				'id' => 31,
				'name' => 'Stealing Las Vegas',
				'synopsis' => 'There\'s a dark side behind the bright lights of Las Vegas, where desperate lives and busted dreams struggle in the shadows to survive. And when a sleazy casino owner (Eric Roberts) swipes $20 million from his employees\' health insurance and pension funds, ex-pro-baseball-player-turned-casino-electrician Nick and his co-workers put together a daring plan to steal the money back. But in a lowdown town of underground cage fights, smoky strip clubs and deadly double-crosses, ca...',
				'cover' => 'stealing-las-vegas.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/0DXbbxW-gLc',
				'slug' => 'stealing-las-vegas',
				'cat_slug' => 'movies',
				'cat_id' => 5
			],
			[
				'id' => 32,
				'name' => 'That\'s not me',
				'synopsis' => 'Polly’s dreams of making it as an actor are shattered when her identical twin sister. Amy lands a plum role in an HBO show and starts dating Jared Leto. Mistaken for her famous sister at every turn, Polly decides to use her sister’s celebrity for her own advantage – free clothes, free booze, casual sex... with disastrous consequences for them both.',
				'cover' => 'thats-not-me.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/EehLmxmx-L4',
				'slug' => 'thats-not-me',
				'cat_slug' => 'movies',
				'cat_id' => 5
			],
			[
				'id' => 33,
				'name' => 'Weakness',
				'synopsis' => 'Suburban high school teacher Joshua Polansky (Bobby Cannavale) finds his world coming apart by degrees over summer vacation when his wife (June Diane Raphael) announces she\'s ready to end their marriage and a host of other family problems rear their ugly heads. Joshua\'s response: A full-scale retreat from adult life that involves embarking on a romance with a former student (Danielle Panabaker), who has qualms of her own about life.',
				'cover' => 'weakness.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/JHtMxY_im9E',
				'slug' => 'weakness',
				'cat_slug' => 'movies',
				'cat_id' => 5
			],
			[
				'id' => 34,
				'name' => 'Birthday Wish',
				'synopsis' => 'Be careful what you wish for because you just might get it. A young, successful man keeps getting jilted by those he falls in love with. He makes a wish for the love he so desires and it comes but from the most unlikely source. How does he cope with this strange love in birthday wish?',
				'cover' => 'birthday-wish.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/l_uw0I7TwS8',
				'slug' => 'birthday-wish',
				'cat_slug' => 'hi-impact-originals',
				'cat_id' => 3
			],
			[
				'id' => 35,
				'name' => 'Insights',
				'synopsis' => 'A wounded soldier is eager to return to the battle field but is made to serve his full-time in recovery. He becomes fascinated by a neighbour who is constantly being maltreated by her spouse. The Soldier’s wife becomes confrontational with accusations of adultery. Is that really the case or there is more to this story?',
				'cover' => 'insights.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/DzuWGFYtAAQ',
				'slug' => 'insight',
				'cat_slug' => 'hi-impact-originals',
				'cat_id' => 3
			],
			[
				'id' => 36,
				'name' => 'The Michaels',
				'synopsis' => 'A psychopathic couple decide to extend their love affairs to their neighbour, client and husband’s secretary. The couple who happen to be lawyers find themselves in trouble with this escapade and are being blackmailed by an anonymous observer. Find out how they avoid investigation and uncover the mysteries in this thriller.',
				'cover' => 'the-michaels.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/c1E37vqll8k',
				'slug' => 'the-michaels',
				'cat_slug' => 'hi-impact-originals',
				'cat_id' => 3
			],
			[
				'id' => 37,
				'name' => 'Hi-Impact Praise Blast',
				'synopsis' => '',
				'cover' => 'praise-blast.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/6VAH3FcdlFM',
				'slug' => 'praise-blast',
				'cat_slug' => 'hi-impact-originals',
				'cat_id' => 3
			],
			[
				'id' => 38,
				'name' => 'Hi-Impact Reloaded',
				'synopsis' => '',
				'cover' => 'hi-impact-reloaded.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/23utHU6smZo',
				'slug' => 'hi-impact-reloaded',
				'cat_slug' => 'hi-impact-originals',
				'cat_id' => 3
			],
			[
				'id' => 39,
				'name' => 'Dance Afrique',
				'synopsis' => '',
				'cover' => 'dance-afrique.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/rI1q5GLR2HQ',
				'slug' => 'dance-afrique',
				'cat_slug' => 'hi-impact-originals',
				'cat_id' => 3
			],
			[
				'id' => 40,
				'name' => 'Shut Down Concert',
				'synopsis' => '',
				'cover' => 'shut-down-concert.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/x-ySdrsJFFs',
				'slug' => 'shut-down-concert',
				'cat_slug' => 'hi-impact-originals',
				'cat_id' => 3
			],
			[
				'id' => 41,
				'name' => 'Memoirs and Wine',
				'synopsis' => '',
				'cover' => 'memoirs-n-wine.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/HjB4UiB4y-o',
				'slug' => 'memoirs-and-wine',
				'cat_slug' => 'hi-impact-originals',
				'cat_id' => 3
			],
			[
				'id' => 42,
				'name' => 'Celebrating African Adire Heritage',
				'synopsis' => '',
				'cover' => 'no-image.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/VTR07a2hJ2o',
				'slug' => 'memoirs-and-wine',
				'cat_slug' => 'hi-impact-specials',
				'cat_id' => 8
			],
			[
				'id' => 43,
				'name' => 'Angry Residents of Denro-Ishahi',
				'synopsis' => '',
				'cover' => 'no-image.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/OnWacbtyFpw',
				'slug' => 'memoirs-and-wine',
				'cat_slug' => 'hi-impact-specials',
				'cat_id' => 8
			],
			[
				'id' => 44,
				'name' => 'Unsung Tales of Scavengers',
				'synopsis' => '',
				'cover' => 'no-image.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/MadgmihJNds',
				'slug' => 'memoirs-and-wine',
				'cat_slug' => 'hi-impact-specials',
				'cat_id' => 8
			],
			[
				'id' => 45,
				'name' => 'The Football Review',
				'synopsis' => 'The Football Review focuses exclusively on European football including domestic, club and international fixtures, making it unique in its subject focus. Brimming with innovative editorial approach and presentation elements, two episodes are produced every week ensuring timely reporting of news and developments.<br /><br</>
The program incorporates intelligence and an innovative approach to research and statistical analysis to convey a unique interpretation and insight that is usually overlooked by most football media outlets.
',
				'cover' => 'football-review.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/dXtpgKlsyRo',
				'slug' => 'football-review',
				'cat_slug' => 'sports',
				'cat_id' => 6
			],
			[
				'id' => 46,
				'name' => 'PYAA ALBELA (UNIQUE LOVE)',
				'synopsis' => 'This is an intriguing love story of Naren and Pooja whose personalities are contrasting. Naren is a young man from a rich background, who is committed to meditation and spirituality. He is misunderstood by his parents who believe he’s strange in appearance and character, they resolved to bring Pooja into his world.',
				'cover' => 'unique-love.jpg',
				'cover_type' => 'image',
				'trailer' => 'https://www.youtube.com/embed/rHwHbAxiUjE',
				'slug' => 'unique-love',
				'cat_slug' => 'movies',
				'cat_id' => 5
			]


		];
	}

	public static function programmesById($id) {
		$programmesList = self::programmes();
		$programmes = [];

		foreach ($programmesList as $programme) {
			if($programme['cat_id'] == $id) {
				$programmes[] = $programme;
			}
		}

		return $programmes;
	}

	public static function getProgrammeBySlug($slug) {
		$programmesList = self::programmes();
		$programme = null;

		foreach ($programmesList as $programme) {
			if($programme['slug'] == $slug) {
				$programme = $programme;
				break;
			}
		}

		return $programme;
	}

	public static function getProgrammesByCategorySlug($slug) {
		$programmesList = self::programmes();
		$list = [];
		foreach ($programmesList as $programme) {
			if($programme['cat_slug'] == $slug) {
				$list[] = $programme;
			}
		}

		return $list;
	}

	public static function news() {
		$news = [
			[
				'id' => 1,
				'title' => 'NEWS AROUND THE GLOBE | NIGERIANS MUST NOW APPEAR IN PERSON FOR VISA RENEWAL - US',
				'cover' => 'https://www.youtube.com/embed/IGXUzhG9du8',
				'cover_type' => 'video',
				'excerpt' => '',
				'content' => '',
				'date' => 'May 17, 2019',
				'slug' => 'news-1', 
			],
			[
				'id' => 2,
				'title' => 'NEWS AROUND THE GLOBE | NIGERIAN SENATE TO AVERT MASS REVOLT BRIDGING POVERTY GAP',
				'cover' => 'https://www.youtube.com/embed/MgpTOCaNkWw',
				'cover_type' => 'video',
				'excerpt' => '',
				'content' => '',
				'date' => 'May 17, 2019',
				'slug' => 'news-2', 
			],
			[
				'id' => 3,
				'title' => 'NEWS AROUND THE GLOBE | CHANCELLOR ANGELA MARKEL TO VISIT NIGERIA',
				'cover' => 'https://www.youtube.com/embed/pf9yiFldHjg',
				'cover_type' => 'video',
				'excerpt' => '',
				'content' => '',
				'date' => 'Aug 28, 2018',
				'slug' => 'news-3', 
			],
			[
				'id' => 4,
				'title' => 'NEWS AROUND THE GLOBE | SWEDISH ROYAL CROWNS STOLEN',
				'cover' => 'https://www.youtube.com/embed/-ZCdVe9uT3M',
				'cover_type' => 'video',
				'excerpt' => '',
				'content' => '',
				'date'=> 'Aug 9, 2018',
				'slug' => 'news-4', 
			],
			[
				'id' => 5,
				'title' => 'NEWS AROUND THE GLOBE | 12 YEAR OLD BOY SURVIVES PLANE CRASH IN INDONESIA',
				'cover' => 'https://www.youtube.com/embed/IGXUzhG9du8',
				'cover_type' => 'video',
				'excerpt' => '',
				'content' => '',
				'date' => 'Aug 13, 2018',
				'slug' => 'news-5', 
			],
			[
				'id' => 42,
				'title' => 'Celebrating African Adire Heritage',
				'content' => '',
				//'cover' => 'no-image.jpg',
				'cover_type' => 'video',
				'cover' => 'https://www.youtube.com/embed/VTR07a2hJ2o',
				'slug' => 'adire-heritage',
				'cat_slug' => 'hi-impact-specials',
				'date' => 'May 31, 2019',
				'cat_id' => 8
			],
			[
				'id' => 43,
				'title' => 'Angry Residents of Denro-Ishahi',
				'content' => '',
				//'cover' => 'no-image.jpg',
				'cover_type' => 'video',
				'cover' => 'https://www.youtube.com/embed/OnWacbtyFpw',
				'slug' => 'denro-ishahi',
				'cat_slug' => 'hi-impact-specials',
				'cat_id' => 8,
				'date' => 'May 31, 2019',
			],
			[
				'id' => 44,
				'title' => 'Unsung Tales of Scavengers',
				'content' => '',
				//'cover' => 'no-image.jpg',
				'cover_type' => 'video',
				'cover' => 'https://www.youtube.com/embed/MadgmihJNds',
				'slug' => 'scavengers',
				'cat_slug' => 'hi-impact-specials',
				'cat_id' => 8,
				'date' => 'May 31, 2019',
			],
		];
		return $news;
	}

	public static function newsBySlug($slug) {
		$news = self::news();
		$n = [];
		foreach ($news as $nw) {
			if($nw['slug'] == $slug) {
				return $nw;
			}
		}
		return $n;
	}

	public static function schedules() {
		$schedules = [
			[
				'title' => 'Tea or Coffee',
				'cover' => 'tea-or-coffee.jpg',
				'cover_type' => 'image',
				'days' => 'Mon - Fri',
				'time' => '7am - 10pm WAT'
			],
			[
				'title' => 'Mid Day Special',
				'cover' => 'mid-day-special.jpg',
				'cover_type' => 'image',
				'days' => 'Mon - Fri',
				'time' => '12:30pm-2pm WAT'
			],
			[
				'title' => 'Catch Phrase',
				'cover' => 'catch-phrase.jpg',
				'cover_type' => 'image',
				'days' => 'Sat - Sun',
				'time' => '1pm | 4pm WAT'
			],
			[
				'title' => 'Movies',
				'cover' => 'a-perfect-man.jpg',
				'cover_type' => 'image',
				'days' => 'Mon - Fri',
				'time' => '2pm-4pm WAT'
			],
			[
				'title' => 'Yours Truly',
				'cover' => 'yours-truly.jpg',
				'cover_type' => 'image',
				'days' => 'Sun',
				'time' => '2pm WAT'
			],
			[
				'title' => 'News around the globe',
				'cover' => 'no-image.jpg',
				'cover_type' => 'image',
				'days' => 'Mon - Sun',
				'time' => '9pm WAT'
			],
			[
				'title' => 'When you are mine',
				'cover' => 'when-you-are-mine.jpg',
				'cover_type' => 'image',
				'days' => 'Fri - Sun',
				'time' => '7am - 10pm WAT'
			],
			[
				'title' => 'So much love',
				'cover' => 'so-much-love.jpg',
				'cover_type' => 'image',
				'days' => 'Sat - Sun',
				'time' => '8pm–9pm WAT'
			],
			[
				'title' => 'Match Game',
				'cover' => 'match-game.jpg',
				'cover_type' => 'image',
				'days' => 'Sun',
				'time' => '8pm - 9pm WAT'
			],
			[
				'title' => 'Children\'s belt(cartoon)',
				'cover' => 'no-image.jpg',
				'cover_type' => 'image',
				'days' => 'Sun',
				'time' => '7pm – 8pm WAT'
			]
		];
		return $schedules;
	}
}