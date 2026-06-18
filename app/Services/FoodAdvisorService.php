<?php

namespace App\Services;

use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class FoodAdvisorService
{
    private const STOP_WORDS = [
        'i', 'want', 'would', 'like', 'need', 'get', 'give', 'show', 'find', 'something',
        'please', 'me', 'a', 'an', 'the', 'some', 'any', 'for', 'to', 'my', 'im', "i'm",
        'can', 'you', 'recommend', 'suggestion', 'suggest', 'what', 'do', 'have', 'is',
        'are', 'good', 'best', 'maybe', 'think', 'about', 'eat', 'eating', 'order', 'food',
        'under', 'below', 'less', 'than', 'around', 'max', 'budget', 'peso', 'php', 'dish',
        'hungry', 'craving', 'feel', 'feeling', 'naman', 'lang', 'po', 'pls',
    ];

    /** Items hidden from customer menu pages (bento builder parts, etc.) */
    private const HIDDEN_MENU_ITEMS = [
        'Teriyaki Chicken',
        'Beef Teriyaki',
        'Tonkatsu',
        'Chicken Katsu',
        'Salmon Grilled',
        'Ebi Tempura',
        'Tempura Vegetables',
        'Mixed Tempura Platter',
        'Shrimp Tempura (5 pcs)',
        'Vegetable Tempura',
        'Green Tea',
        'Iced Coffee',
        'Fresh Lemonade',
        'Soda',
        'California Roll (8 pcs)',
        'Spicy Tuna Roll (8 pcs)',
        'Dragon Roll (8 pcs)',
        'Rainbow Roll (8 pcs)',
        'Seaweed Salad',
        'Steamed Rice',
        'Spring Rolls (4 pcs)',
        'Gyoza (3 pcs)',
        'Gyoza',
        'Edamame',
        'Miso Soup',
        'Pickled Vegetables',
        'Salad',
    ];

    private const CATEGORY_INTENTS = [
        'sushi' => 'sushi',
        'sashimi' => 'sushi',
        'maki' => 'sushi',
        'spring roll' => 'appetizers',
        'ramen' => 'ramen',
        'noodle' => 'ramen',
        'noodles' => 'ramen',
        'bento' => 'bento-boxes',
        'kyaraben' => 'bento-boxes',
        'makunouchi' => 'bento-boxes',
        'tempura' => 'tempura',
        'dessert' => 'desserts',
        'desserts' => 'desserts',
        'sweet' => 'desserts',
        'drink' => 'drinks',
        'drinks' => 'drinks',
        'beverage' => 'drinks',
        'thirsty' => 'drinks',
        'tea' => 'drinks',
        'coffee' => 'drinks',
        'appetizer' => 'appetizers',
        'appetizers' => 'appetizers',
        'starter' => 'appetizers',
        'starters' => 'appetizers',
        'donburi' => 'donburi',
        'rice bowl' => 'donburi',
    ];

    private const DISH_INTENTS = [
        'tonkotsu' => ['tonkotsu'],
        'shoyu' => ['shoyu'],
        'shio' => ['shio'],
        'miso ramen' => ['miso ramen'],
        'spicy ramen' => ['spicy miso ramen'],
        'spicy tuna' => ['spicy tuna'],
        'california roll' => ['california roll'],
        'dragon roll' => ['dragon roll'],
        'rainbow roll' => ['rainbow roll'],
        'gyoza' => ['gyoza'],
        'gyudon' => ['gyudon', 'gyūdon'],
        'oyakodon' => ['oyakodon'],
        'unadon' => ['unadon', 'una don', 'eel bowl'],
        'katsudon' => ['katsudon'],
        'karaage' => ['karaage'],
        'yakitori' => ['yakitori'],
        'takoyaki' => ['takoyaki'],
        'mochi' => ['mochi'],
        'dorayaki' => ['dorayaki'],
        'taiyaki' => ['taiyaki'],
        'matcha' => ['matcha'],
        'ramune' => ['ramune'],
        'calpico' => ['calpico', 'calpis'],
        'sake' => ['sake'],
        'green tea' => ['green tea'],
        'teriyaki chicken' => ['teriyaki chicken'],
        'tonkatsu' => ['tonkatsu'],
        'katsu' => ['tonkatsu', 'katsudon'],
        'fried chicken' => ['karaage'],
        'ebi tempura' => ['ebi tempura'],
        'vegetable tempura' => ['vegetable tempura', 'yasai tempura'],
        'vegetable ramen' => ['vegetable ramen'],
        'custom bento' => ['custom bento'],
    ];

    private const INGREDIENT_INTENTS = [
        'chicken' => ['chicken', 'karaage', 'oyakodon', 'yakitori'],
        'pork' => ['pork', 'tonkatsu', 'katsudon', 'buta'],
        'beef' => ['beef', 'gyudon', 'gyūdon', 'sukiyaki'],
        'salmon' => ['salmon'],
        'tuna' => ['tuna'],
        'eel' => ['eel', 'unagi', 'unadon', 'una don'],
        'shrimp' => ['shrimp', 'ebi'],
        'fish' => ['salmon', 'tuna', 'sashimi', 'ebi', 'shrimp', 'eel', 'unagi', 'kisu', 'whiting'],
        'seafood' => ['salmon', 'tuna', 'sashimi', 'ebi', 'shrimp', 'eel', 'unagi', 'kisu', 'whiting'],
        'vegetable' => ['vegetable', 'yasai', 'tofu', 'edamame'],
        'tofu' => ['tofu', 'agedashi'],
    ];

    private const SPICY_MARKERS = ['spicy', 'hot', 'chili', 'chilli'];

    private const NON_VEGETARIAN = [
        'chicken', 'beef', 'pork', 'tonkatsu', 'katsu', 'salmon', 'tuna', 'ebi', 'shrimp',
        'fish', 'eel', 'unagi', 'crab', 'octopus', 'takoyaki', 'karaage', 'yakitori',
        'sashimi', 'sukiyaki', 'gyudon', 'gyūdon', 'oyakodon', 'unadon', 'katsudon',
        'pork cutlet', 'ground pork', 'whiting', 'meat', 'egg bowl',
    ];

    private const FAQ_ANSWERS = [
        [
            'keywords' => ['hour', 'hours', 'open', 'close', 'closing', 'time', 'operating', 'oras', 'bukas', 'sarado'],
            'answer' => "We're open daily from 10:00 AM to 10:00 PM. Last order is at 9:30 PM.",
        ],
        [
            'keywords' => ['deliver', 'delivery', 'deliver', 'padala'],
            'answer' => 'Yes, we offer delivery through our website. Add items to your cart and checkout. Delivery is available within Metro Manila.',
        ],
        [
            'keywords' => ['payment', 'pay', 'gcash', 'maya', 'card', 'cash', 'bayad'],
            'answer' => 'We accept cash, credit/debit cards (Visa, Mastercard), GCash, Maya, and bank transfers.',
        ],
        [
            'keywords' => ['cater', 'catering', 'event', 'party'],
            'answer' => 'Yes, we offer catering for events. Please contact us at least 3 days in advance.',
        ],
        [
            'keywords' => ['track', 'order status', 'where is my order', 'my order'],
            'answer' => 'If you have an account, track your order in your dashboard under "My Orders".',
        ],
        [
            'keywords' => ['cancel', 'modify', 'change order'],
            'answer' => 'Orders can be cancelled or changed within 5 minutes of placing them. After that, please contact customer service.',
        ],
        [
            'keywords' => ['location', 'address', 'where are you', 'saan', 'store'],
            'answer' => 'You can find our store locations on the Stores page. Visit /stores for addresses and directions.',
        ],
        [
            'keywords' => ['contact', 'phone', 'email', 'call', 'reach'],
            'answer' => 'Visit our Contact page for phone, email, and inquiry options.',
        ],
        [
            'keywords' => ['who are you', 'what are you', 'your name', 'bot', 'chatbot'],
            'answer' => "I'm the Washoku Food Advisor. I help you pick dishes from our menu — ask me about food, budget, or dietary preferences!",
        ],
        [
            'keywords' => ['hello', 'hi', 'hey', 'good morning', 'good afternoon', 'good evening', 'kumusta', 'kamusta'],
            'answer' => "Hello! I'm here to help you find something delicious. What are you in the mood for — sushi, ramen, bento, or something else?",
        ],
        [
            'keywords' => ['help me', 'can you help', 'need help', 'how does this work', 'how to use', 'paano'],
            'answer' => "Tell me what you're craving — like \"ramen under 300\" or \"low calorie vegetarian\". You can also ask about hours, delivery, or payment!",
        ],
        [
            'keywords' => ['vegetarian option', 'vegan option', 'no meat option', 'plant based option'],
            'answer' => 'Yes! We have vegetarian options like vegetable tempura, vegetable ramen, agedashi tofu, mochi, and more. Try asking: "vegetarian under 300".',
        ],
        [
            'keywords' => ['customize bento', 'custom bento', 'bento builder', 'build bento'],
            'answer' => 'You can build your own bento at /bento-builder — pick a main dish and sides to create your perfect meal!',
        ],
        [
            'keywords' => ['popular', 'bestseller', 'best seller', 'most ordered', 'famous'],
            'answer' => 'Our customer favorites include tonkotsu ramen, teriyaki chicken bento, and california roll. Ask me "recommend something popular" for picks!',
        ],
        [
            'keywords' => ['calorie info', 'nutrition', 'nutritional', 'how many calories', 'calorie count'],
            'answer' => 'Calories are shown on each menu item and in my recommendations. Try "low calorie under 300" and I\'ll find lighter options!',
        ],
        [
            'keywords' => ['how are you', 'how r u', 'okay ka', 'are you real', 'are you human'],
            'answer' => "I'm the Washoku Food Advisor — a menu helper, not a person! But I'm happy to help you find great food. What would you like to eat?",
        ],
        [
            'keywords' => ['menu', 'what do you sell', 'what food', 'anong meron', 'what do you have'],
            'answer' => 'We serve sushi, ramen, bento boxes, tempura, donburi rice bowls, appetizers, desserts, and drinks. What category interests you?',
        ],
    ];

    public function recommend(array $preferences = [], ?User $user = null, ?string $message = null, ?string $action = null): array
    {
        $message = $message ? trim($message) : null;
        $fromMessage = (bool) $message;
        $context = $this->normalizePreferences($preferences);

        if ($action) {
            $preferences = $this->applyAction($context, $action);
            $fromMessage = false;
        } elseif ($fromMessage) {
            $faqAnswer = $this->answerGeneralQuestion($message);
            if ($faqAnswer) {
                return [
                    'type' => 'answer',
                    'message' => $faqAnswer,
                    'recommendations' => [],
                    'preferences' => $context,
                ];
            }

            $parsed = $this->parseMessage($message);
            $preferences = $this->mergePreferences($context, $parsed, $message);
        } else {
            $preferences = $context;
        }

        $items = $this->getMenuItems();
        $scored = $this->buildRecommendations($items, $preferences, $user, $fromMessage);

        if ($scored->isEmpty() && $preferences['budget_max'] !== null && ! ($preferences['budget_strict'] ?? false)) {
            $relaxed = $preferences;
            $relaxed['budget_max'] = (int) ceil($preferences['budget_max'] * 1.15);
            $scored = $this->buildRecommendations($items, $relaxed, $user, $fromMessage);
            if ($scored->isNotEmpty()) {
                $preferences = $relaxed;
            }
        }

        $recommendations = $this->deduplicateResults($scored)
            ->take(4)
            ->map(fn (array $row) => $this->formatRecommendation($row['item'], $row['reason']))
            ->values()
            ->all();

        $recommendations = $this->verifyRecommendations($recommendations, $preferences);

        return [
            'type' => 'recommendations',
            'message' => $this->buildResponseMessage($preferences, $recommendations, $fromMessage),
            'recommendations' => $recommendations,
            'preferences' => $preferences,
        ];
    }

    public function answerGeneralQuestion(string $message): ?string
    {
        $text = $this->normalizeMessage($message);

        if ($this->looksLikeFoodRequest($text)) {
            return null;
        }

        foreach (self::FAQ_ANSWERS as $faq) {
            foreach ($faq['keywords'] as $keyword) {
                if ($this->messageContainsPhrase($text, $keyword)) {
                    return $faq['answer'];
                }
            }
        }

        if (Str::contains($text, ['thank', 'salamat', 'thanks'])) {
            return "You're welcome! Let me know if you'd like more food recommendations.";
        }

        return null;
    }

    private function looksLikeFoodRequest(string $text): bool
    {
        $foodSignals = [
            'ramen', 'sushi', 'bento', 'tempura', 'dessert', 'drink', 'donburi', 'gyoza',
            'chicken', 'pork', 'beef', 'fish', 'vegetarian', 'spicy', 'mild', 'heavy', 'hearty',
            'light', 'cheap', 'budget', 'under', 'below', 'recommend', 'suggest', 'order',
            'hungry', 'craving', 'something', 'katsu', 'takoyaki', 'mochi', 'matcha', 'noodle',
            'calorie', 'calories', 'kcal', 'healthy', 'diet',
        ];

        foreach ($foodSignals as $signal) {
            if ($this->messageContainsPhrase($text, $signal)) {
                return true;
            }
        }

        return (bool) preg_match('/(?:under|below)\s+\d+/i', $text);
    }

    public function parseMessage(string $message): array
    {
        $text = $this->normalizeMessage($message);

        $parsed = [
            'category' => 'any',
            'budget_max' => null,
            'budget_strict' => false,
            'calorie_max' => null,
            'dietary' => 'any',
            'spice' => 'any',
            'portion' => 'any',
            'dish_tokens' => [],
            'ingredient_tokens' => [],
            'raw_query' => $text,
        ];

        foreach (collect(self::DISH_INTENTS)->sortByDesc(fn ($tokens, $phrase) => strlen($phrase)) as $phrase => $tokens) {
            if (Str::contains($text, $phrase)) {
                $parsed['dish_tokens'] = array_merge($parsed['dish_tokens'], $tokens);
            }
        }

        foreach (self::INGREDIENT_INTENTS as $phrase => $tokens) {
            if ($this->messageContainsPhrase($text, $phrase)) {
                $parsed['ingredient_tokens'] = array_merge($parsed['ingredient_tokens'], $tokens);
            }
        }

        foreach (collect(self::CATEGORY_INTENTS)->sortByDesc(fn ($slug, $phrase) => strlen($phrase)) as $phrase => $slug) {
            if ($this->messageContainsPhrase($text, $phrase)) {
                $parsed['category'] = $slug;
                break;
            }
        }

        if (preg_match('/(?:under|below|less than|max|budget)\s*₱?\s*(\d+)/i', $text, $m)) {
            $parsed['budget_max'] = (int) $m[1];
            $parsed['budget_strict'] = true;
        } elseif (preg_match('/(\d+)\s*budget/i', $text, $m)) {
            $parsed['budget_max'] = (int) $m[1];
            $parsed['budget_strict'] = true;
        } elseif (preg_match('/(?:under|below|less than)\s+(\d+)/i', $text, $m)) {
            $parsed['budget_max'] = (int) $m[1];
            $parsed['budget_strict'] = true;
        } elseif (preg_match('/₱?\s*(\d+)\s*(?:or less|and under)/i', $text, $m)) {
            $parsed['budget_max'] = (int) $m[1];
            $parsed['budget_strict'] = true;
        } elseif ($this->messageContainsPhrase($text, 'cheap') || Str::contains($text, ['affordable', 'budget-friendly'])) {
            $parsed['budget_max'] = 280;
        }

        if (preg_match('/(?:under|below|less than|max)\s+(\d+)\s*(?:cal|kcal|calories)/i', $text, $m)) {
            $parsed['calorie_max'] = (int) $m[1];
        } elseif (Str::contains($text, ['low calorie', 'low cal', 'low calories', 'less calorie', 'fewer calorie', 'mababang calorie', 'diet meal', 'healthy meal', 'light calorie', 'just low calorie', 'with just low calorie', 'with low calorie', 'low calorie only'])) {
            $parsed['calorie_max'] = 350;
            $parsed['portion'] = 'light';
        }

        if (Str::contains($text, ['vegetarian', 'vegan', 'no meat', 'plant based', 'plant-based', 'veggie'])) {
            $parsed['dietary'] = 'vegetarian';
        } elseif (! empty($parsed['ingredient_tokens']) && $this->hasSeafoodIngredientIntent($parsed['ingredient_tokens'])) {
            $parsed['dietary'] = 'seafood';
        } elseif (Str::contains($text, ['meat lover', 'meat'])) {
            $parsed['dietary'] = 'meat';
        }

        if (Str::contains($text, ['no spicy', 'not spicy', 'mild', 'no spice'])) {
            $parsed['spice'] = 'mild';
        } elseif ($this->messageContainsPhrase($text, 'spicy') || Str::contains($text, ['chili', 'chilli'])) {
            $parsed['spice'] = 'spicy';
        }

        if (Str::contains($text, ['light', 'healthy', 'something small', 'magaan'])) {
            $parsed['portion'] = 'light';
        } elseif (Str::contains($text, ['filling', 'hearty', 'heavy', 'big meal', 'busog', 'malakas', 'masarap na malaki'])) {
            $parsed['portion'] = 'hearty';
        }

        $parsed['dish_tokens'] = array_values(array_unique($parsed['dish_tokens']));
        $parsed['ingredient_tokens'] = array_values(array_unique($parsed['ingredient_tokens']));

        return $parsed;
    }

    private function mergePreferences(array $context, array $parsed, string $message): array
    {
        $merged = $this->normalizePreferences($context);
        $text = $this->normalizeMessage($message);

        if ($parsed['category'] !== 'any') {
            $merged['category'] = $parsed['category'];
            $merged['exclude_ids'] = [];
        }

        if ($parsed['budget_max'] !== null) {
            $merged['budget_max'] = $parsed['budget_max'];
            $merged['budget_strict'] = $parsed['budget_strict'];
        }

        if ($parsed['calorie_max'] !== null) {
            $merged['calorie_max'] = $parsed['calorie_max'];
        }

        if ($parsed['dietary'] !== 'any') {
            $merged['dietary'] = $parsed['dietary'];
        }

        if ($parsed['spice'] !== 'any') {
            $merged['spice'] = $parsed['spice'];
        }

        if ($parsed['portion'] !== 'any') {
            $merged['portion'] = $parsed['portion'];
        }

        if (! empty($parsed['dish_tokens'])) {
            $merged['dish_tokens'] = $parsed['dish_tokens'];
            $merged['exclude_ids'] = [];
        }

        if (! empty($parsed['ingredient_tokens'])) {
            $merged['ingredient_tokens'] = $parsed['ingredient_tokens'];
        }

        if (Str::contains($text, ['something else', 'other option', 'more option', 'different one', 'another one', 'show me more', 'other choices', 'iba pa', 'more choices', 'same preferences'])) {
            // keep filters, rotate results via exclude_ids
        }

        $refineCheaper = Str::contains($text, ['cheaper', 'lower budget', 'less expensive', 'lower price', 'mas mura', 'bawas presyo', 'mas murang']);
        $refineLowCal = Str::contains($text, ['lower calorie', 'fewer calorie', 'less calorie', 'even healthier', 'lower cal', 'mas mababang calorie', 'even lower calorie']);

        if ($refineCheaper) {
            $base = $merged['budget_max'] ?? 400;
            $merged['budget_max'] = max(80, (int) floor($base * 0.75));
            $merged['budget_strict'] = true;
            $merged['sort_mode'] = 'cheapest';
            $merged['exclude_ids'] = [];
        }

        if ($refineLowCal) {
            if (($merged['calorie_max'] ?? null) !== null) {
                $base = $merged['calorie_max'];
                $merged['calorie_max'] = max(80, (int) floor($base * 0.75));
            }
            $merged['sort_mode'] = $refineCheaper ? 'cheapest_cal' : 'lowest_cal';
            $merged['exclude_ids'] = [];
        }

        if (Str::contains($text, ['start over', 'reset', 'clear', 'from scratch'])) {
            $merged = $this->defaultPreferences();
            $merged['raw_query'] = $text;
        }

        $merged['raw_query'] = $text;

        return $merged;
    }

    private function applyAction(array $context, string $action): array
    {
        $merged = $this->normalizePreferences($context);

        return match ($action) {
            'rotate' => $merged,
            'refine_cheaper' => $this->refineCheaper($merged),
            'refine_lowcal' => $this->refineLowCal($merged),
            'refine_both' => $this->refineLowCal($this->refineCheaper($merged)),
            default => $merged,
        };
    }

    private function refineCheaper(array $merged): array
    {
        $base = $merged['budget_max'] ?? $this->suggestBudgetCap($merged);
        $merged['budget_max'] = max(80, (int) floor($base * 0.75));
        $merged['budget_strict'] = true;
        $merged['sort_mode'] = ($merged['sort_mode'] ?? null) === 'lowest_cal' ? 'cheapest_cal' : 'cheapest';
        $merged['exclude_ids'] = [];

        return $merged;
    }

    private function refineLowCal(array $merged): array
    {
        if (($merged['calorie_max'] ?? null) !== null) {
            $merged['calorie_max'] = max(80, (int) floor($merged['calorie_max'] * 0.75));
        }

        $merged['sort_mode'] = ($merged['sort_mode'] ?? null) === 'cheapest' ? 'cheapest_cal' : 'lowest_cal';
        $merged['exclude_ids'] = [];

        return $merged;
    }

    private function suggestBudgetCap(array $merged): int
    {
        if ($merged['category'] === 'drinks') {
            return 200;
        }

        if ($merged['category'] === 'desserts') {
            return 250;
        }

        return 350;
    }

    private function defaultPreferences(): array
    {
        return [
            'category' => 'any',
            'budget_max' => null,
            'budget_strict' => false,
            'calorie_max' => null,
            'dietary' => 'any',
            'spice' => 'any',
            'portion' => 'any',
            'dish_tokens' => [],
            'ingredient_tokens' => [],
            'exclude_ids' => [],
            'sort_mode' => null,
            'raw_query' => '',
        ];
    }

    private function normalizePreferences(array $preferences): array
    {
        return [
            'category' => $preferences['category'] ?? 'any',
            'budget_max' => isset($preferences['budget_max']) ? (int) $preferences['budget_max'] : null,
            'budget_strict' => (bool) ($preferences['budget_strict'] ?? (($preferences['budget_max'] ?? null) !== null)),
            'calorie_max' => isset($preferences['calorie_max']) ? (int) $preferences['calorie_max'] : null,
            'dietary' => $preferences['dietary'] ?? 'any',
            'spice' => $preferences['spice'] ?? 'any',
            'portion' => $preferences['portion'] ?? 'any',
            'dish_tokens' => $preferences['dish_tokens'] ?? [],
            'ingredient_tokens' => $preferences['ingredient_tokens'] ?? [],
            'exclude_ids' => array_values(array_unique(array_map('intval', $preferences['exclude_ids'] ?? []))),
            'sort_mode' => $preferences['sort_mode'] ?? null,
            'raw_query' => $preferences['raw_query'] ?? '',
        ];
    }

    private function getMenuItems(): Collection
    {
        return MenuItem::with('category')
            ->where('is_available', true)
            ->where('price', '>', 0)
            ->get();
    }

    private function buildRecommendations(Collection $items, array $preferences, ?User $user, bool $fromMessage): Collection
    {
        $pastOrders = $this->getPastOrderItemNames($user);
        $allowHidden = ! empty($preferences['dish_tokens']);

        return $items
            ->filter(fn (MenuItem $item) => $allowHidden || ! $this->isHiddenMenuItem($item->name))
            ->filter(fn (MenuItem $item) => ! in_array($item->id, $preferences['exclude_ids'] ?? [], true))
            ->map(function (MenuItem $item) use ($preferences, $pastOrders, $fromMessage) {
                if (! $this->passesHardFilters($item, $preferences)) {
                    return null;
                }

                $score = $this->scoreItem($item, $preferences, $pastOrders, $fromMessage);
                $minScore = (! empty($preferences['dish_tokens']) || ! empty($preferences['ingredient_tokens'])) ? 30 : 1;

                if ($score < $minScore) {
                    return null;
                }

                return [
                    'item' => $item,
                    'score' => $score,
                    'reason' => $this->buildReason($item, $preferences, $pastOrders, $score),
                ];
            })
            ->filter()
            ->sort(function (array $a, array $b) use ($preferences) {
                $sortMode = $preferences['sort_mode'] ?? null;

                if ($sortMode === 'cheapest') {
                    $priceCmp = (float) $a['item']->price <=> (float) $b['item']->price;
                    if ($priceCmp !== 0) {
                        return $priceCmp;
                    }
                }

                if ($sortMode === 'lowest_cal') {
                    $calCmp = ($a['item']->calories ?? 9999) <=> ($b['item']->calories ?? 9999);
                    if ($calCmp !== 0) {
                        return $calCmp;
                    }
                }

                if ($sortMode === 'cheapest_cal') {
                    $priceCmp = (float) $a['item']->price <=> (float) $b['item']->price;
                    if ($priceCmp !== 0) {
                        return $priceCmp;
                    }

                    return ($a['item']->calories ?? 9999) <=> ($b['item']->calories ?? 9999);
                }

                if ($a['score'] !== $b['score']) {
                    return $b['score'] <=> $a['score'];
                }

                if ($preferences['calorie_max'] !== null) {
                    return ($a['item']->calories ?? 9999) <=> ($b['item']->calories ?? 9999);
                }

                if ($preferences['budget_max'] !== null) {
                    return (float) $a['item']->price <=> (float) $b['item']->price;
                }

                return 0;
            })
            ->values();
    }

    private function isHiddenMenuItem(string $name): bool
    {
        return in_array($name, self::HIDDEN_MENU_ITEMS, true);
    }

    private function passesHardFilters(MenuItem $item, array $preferences): bool
    {
        $name = $this->normalizeText($item->name);
        $slug = $item->category?->slug;

        if ($preferences['category'] !== 'any' && $slug !== $preferences['category']) {
            return false;
        }

        if ($preferences['category'] === 'drinks' && $this->looksLikeFoodNotDrink($name)) {
            return false;
        }

        if ($preferences['budget_max'] !== null && (float) $item->price > $preferences['budget_max']) {
            return false;
        }

        if ($preferences['calorie_max'] !== null) {
            $calories = $item->calories ?? 9999;
            if ($calories > $preferences['calorie_max']) {
                return false;
            }
        }

        if ($preferences['dietary'] === 'vegetarian' && ! $this->isVegetarianItem($name, $item)) {
            return false;
        }

        if ($preferences['dietary'] === 'seafood' && ! $this->itemMatchesIngredientTokens($name, $this->seafoodTokens())) {
            return false;
        }

        if ($preferences['dietary'] === 'meat' && ! $this->itemMatchesIngredientTokens($name, ['chicken', 'beef', 'pork', 'tonkatsu', 'katsu', 'karaage', 'yakitori', 'sukiyaki', 'gyudon', 'gyūdon'])) {
            return false;
        }

        if ($preferences['spice'] === 'mild' && $this->isSpicyItem($name, $item)) {
            return false;
        }

        if ($preferences['spice'] === 'spicy' && ! $this->isSpicyItem($name, $item)) {
            return false;
        }

        if (! empty($preferences['dish_tokens']) && ! $this->itemMatchesDishTokens($name, $preferences['dish_tokens'])) {
            return false;
        }

        if (! empty($preferences['ingredient_tokens']) && ! $this->itemMatchesIngredientTokens($name, $preferences['ingredient_tokens'])) {
            return false;
        }

        if ($preferences['portion'] === 'hearty') {
            if (in_array($slug, ['desserts', 'drinks'], true)) {
                return false;
            }
            if (! $this->isHeartyItem($name, $item)) {
                return false;
            }
        }

        if ($preferences['portion'] === 'light') {
            if ($this->isHeartyItem($name, $item) && ! in_array($slug, ['drinks', 'desserts', 'appetizers'], true)) {
                return false;
            }
        }

        return true;
    }

    private function scoreItem(MenuItem $item, array $preferences, array $pastOrders, bool $fromMessage): int
    {
        $name = $this->normalizeText($item->name);
        $score = 0;

        if ($fromMessage && ! empty($preferences['raw_query'])) {
            $score += $this->scoreNameAgainstQuery($name, $preferences['raw_query']);
        }

        foreach ($preferences['dish_tokens'] as $token) {
            if ($this->nameContainsToken($name, $this->normalizeText($token))) {
                $score += 80;
            }
        }

        foreach ($preferences['ingredient_tokens'] as $token) {
            if ($this->nameContainsToken($name, $this->normalizeText($token))) {
                $score += 45;
            }
        }

        if ($preferences['category'] !== 'any' && $item->category?->slug === $preferences['category']) {
            $score += 25;
        }

        if ($preferences['portion'] === 'hearty' && $this->isHeartyItem($name, $item)) {
            $score += 30;
        }

        if ($preferences['portion'] === 'light' && $this->isLightItem($name, $item)) {
            $score += 20;
        }

        if ($preferences['calorie_max'] !== null && $item->calories) {
            if ($item->calories <= $preferences['calorie_max']) {
                $score += 25;
            }
            if ($item->calories <= (int) ($preferences['calorie_max'] * 0.75)) {
                $score += 15;
            }
        }

        if ($preferences['dietary'] === 'vegetarian') {
            $score += 10;
        }

        if ($preferences['spice'] === 'spicy' && $this->isSpicyItem($name, $item)) {
            $score += 20;
        }

        if ($item->is_bestseller) {
            $score += 8;
        }

        if ($item->is_featured) {
            $score += 4;
        }

        foreach ($pastOrders as $orderedName) {
            $ordered = $this->normalizeText($orderedName);
            if (Str::contains($name, $ordered) || Str::contains($ordered, $name)) {
                $score += 15;
                break;
            }
        }

        if ($score === 0 && empty($preferences['dish_tokens']) && empty($preferences['ingredient_tokens'])) {
            $score = 5;
        }

        return $score;
    }

    private function verifyRecommendations(array $recommendations, array $preferences): array
    {
        return collect($recommendations)
            ->filter(function (array $item) use ($preferences) {
                if ($preferences['budget_max'] !== null && $item['price'] > $preferences['budget_max']) {
                    return false;
                }

                if ($preferences['category'] !== 'any' && ($item['category_slug'] ?? '') !== $preferences['category']) {
                    return false;
                }

                if ($preferences['calorie_max'] !== null && ($item['calories'] ?? 9999) > $preferences['calorie_max']) {
                    return false;
                }

                return true;
            })
            ->values()
            ->all();
    }

    private function scoreNameAgainstQuery(string $itemName, string $query): int
    {
        if ($itemName === $query) {
            return 120;
        }

        if (Str::contains($itemName, $query) && strlen($query) >= 4) {
            return 100;
        }

        $queryTokens = $this->extractTokens($query);
        foreach ($queryTokens as $token) {
            if ($this->nameContainsToken($itemName, $token)) {
                return 90;
            }
        }

        similar_text($query, $itemName, $percent);
        $score = (int) ($percent * 0.6);

        $nameTokens = $this->extractTokens($itemName);
        if (empty($queryTokens)) {
            return $score;
        }

        $matched = 0;
        foreach ($queryTokens as $token) {
            foreach ($nameTokens as $nameToken) {
                if ($token === $nameToken) {
                    $matched++;
                    break;
                }
            }
        }

        $score += (int) (($matched / count($queryTokens)) * 40);

        return $score;
    }

    private function itemMatchesDishTokens(string $name, array $tokens): bool
    {
        foreach ($tokens as $token) {
            if ($this->nameContainsToken($name, $this->normalizeText($token))) {
                return true;
            }
        }

        return false;
    }

    private function itemMatchesIngredientTokens(string $name, array $tokens): bool
    {
        foreach ($tokens as $token) {
            if ($this->nameContainsToken($name, $this->normalizeText($token))) {
                return true;
            }
        }

        return false;
    }

    private function nameContainsToken(string $name, string $token): bool
    {
        if ($token === '') {
            return false;
        }

        return (bool) preg_match('/\b' . preg_quote($token, '/') . '/u', $name);
    }

    private function looksLikeFoodNotDrink(string $name): bool
    {
        return Str::contains($name, ['bowl', 'donburi', 'katsudon', 'bento', 'cutlet', 'sashimi', 'ramen', 'sushi', 'tempura', 'gyoza', 'una don']);
    }

    private function isVegetarianItem(string $name, MenuItem $item): bool
    {
        if ($this->containsNonVegetarian($name)) {
            return false;
        }

        $safe = [
            'vegetable', 'yasai', 'tofu', 'edamame', 'mochi', 'dorayaki', 'taiyaki',
            'matcha', 'green tea', 'ramune', 'calpico', 'calpis', 'lemonade', 'iced coffee',
            'agedashi', 'spring roll', 'pickled', 'salad',
        ];

        foreach ($safe as $keyword) {
            if (Str::contains($name, $keyword)) {
                return true;
            }
        }

        return $item->category?->slug === 'drinks';
    }

    private function containsNonVegetarian(string $name): bool
    {
        foreach (self::NON_VEGETARIAN as $keyword) {
            if (Str::contains($name, $keyword)) {
                return true;
            }
        }

        return false;
    }

    private function isSpicyItem(string $name, MenuItem $item): bool
    {
        $haystack = $name . ' ' . $this->normalizeText($item->description ?? '');

        foreach (self::SPICY_MARKERS as $marker) {
            if (Str::contains($haystack, $marker)) {
                return true;
            }
        }

        return false;
    }

    private function isLightItem(string $name, MenuItem $item): bool
    {
        return Str::contains($name, ['tea', 'mochi', 'edamame', 'tofu', 'salad', 'lemonade', 'ramune', 'calpico', 'dorayaki', 'taiyaki'])
            || in_array($item->category?->slug, ['drinks', 'desserts'], true);
    }

  private function isHeartyItem(string $name, MenuItem $item): bool
  {
    $slug = $item->category?->slug;

    if (in_array($slug, ['ramen', 'donburi'], true)) {
      return true;
    }

    if ($slug === 'bento-boxes' && Str::contains($name, 'bento')) {
      return true;
    }

    return Str::contains($name, ['ramen', 'donburi', 'gyudon', 'oyakodon', 'unadon', 'katsudon', 'bowl', 'katsu', 'sukiyaki', 'curry rice', 'platter', 'teriyaki chicken bento', 'tonkatsu pork cutlet']);
  }

    private function deduplicateResults(Collection $results): Collection
    {
        $seen = [];

        return $results->filter(function (array $row) use (&$seen) {
            $key = $this->normalizeItemKey($row['item']->name);
            if (isset($seen[$key])) {
                return false;
            }
            $seen[$key] = true;

            return true;
        })->values();
    }

    private function normalizeItemKey(string $name): string
    {
        $name = $this->normalizeText($name);
        $name = preg_replace('/\s*\(\d+\s*pcs?\)/', '', $name) ?? $name;
        $name = preg_replace('/\s*\([^)]*\)/', '', $name) ?? $name;

        return trim($name);
    }

    private function normalizeMessage(string $message): string
    {
        $text = $this->normalizeText($message);

        $replacements = [
            'sumthing' => 'something',
            'somthing' => 'something',
            'smth' => 'something',
            'undr' => 'under',
            'undet' => 'under',
            'hevy' => 'heavy',
            'hvy' => 'heavy',
        ];

        foreach ($replacements as $from => $to) {
            $text = str_replace($from, $to, $text);
        }

        return $text;
    }

    private function normalizeText(string $text): string
    {
        $text = Str::lower($text);
        $text = str_replace(['ū', 'ū'], 'u', $text);
        $text = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $text) ?? $text;

        return trim(preg_replace('/\s+/', ' ', $text) ?? $text);
    }

    private function extractTokens(string $text): array
    {
        $tokens = [];
        foreach (preg_split('/\s+/', $this->normalizeText($text)) ?: [] as $word) {
            if (strlen($word) < 2 || in_array($word, self::STOP_WORDS, true) || is_numeric($word)) {
                continue;
            }
            $tokens[] = $word;
        }

        return array_values(array_unique($tokens));
    }

    private function messageContainsPhrase(string $text, string $phrase): bool
    {
        $phrase = $this->normalizeText($phrase);

        if (str_contains($phrase, ' ')) {
            return Str::contains($text, $phrase);
        }

        return (bool) preg_match('/\b' . preg_quote($phrase, '/') . '\b/u', $text);
    }

    private function hasSeafoodIngredientIntent(array $tokens): bool
    {
        return ! empty(array_intersect($tokens, $this->seafoodTokens()));
    }

    private function seafoodTokens(): array
    {
        return ['salmon', 'tuna', 'sashimi', 'ebi', 'shrimp', 'eel', 'unagi', 'kisu', 'whiting', 'fish'];
    }

    private function getPastOrderItemNames(?User $user): array
    {
        if (! $user) {
            return [];
        }

        return $user->orders()
            ->with('items')
            ->latest()
            ->take(5)
            ->get()
            ->flatMap(fn ($order) => $order->items->pluck('item_name'))
            ->unique()
            ->values()
            ->all();
    }

    private function buildReason(MenuItem $item, array $preferences, array $pastOrders, int $score): string
    {
        $name = $this->normalizeText($item->name);
        $reasons = [];

        foreach ($preferences['dish_tokens'] as $token) {
            if (Str::contains($name, $this->normalizeText($token))) {
                $reasons[] = 'exactly what you asked for';
                break;
            }
        }

        if ($preferences['portion'] === 'hearty') {
            $reasons[] = 'a filling, hearty meal';
        }

        if (empty($reasons) && $score >= 80) {
            $reasons[] = 'closely matches your request';
        }

        if ($preferences['category'] !== 'any' && $item->category?->slug === $preferences['category']) {
            $reasons[] = 'from our ' . Str::lower($item->category->name) . ' menu';
        }

        if ($preferences['budget_max'] !== null) {
            $reasons[] = 'within your ₱' . $preferences['budget_max'] . ' budget';
        }

        if (($preferences['sort_mode'] ?? null) === 'cheapest' || ($preferences['sort_mode'] ?? null) === 'cheapest_cal') {
            $reasons[] = 'best value for your budget';
        }

        if (($preferences['sort_mode'] ?? null) === 'lowest_cal' || ($preferences['sort_mode'] ?? null) === 'cheapest_cal') {
            $reasons[] = 'lighter option';
        }

        if ($preferences['calorie_max'] !== null && $item->calories && $item->calories <= $preferences['calorie_max']) {
            $reasons[] = 'low calorie at ' . $item->calories . ' kcal';
        } elseif ($item->calories) {
            $reasons[] = $item->calories . ' kcal';
        }

        if ($item->is_bestseller) {
            $reasons[] = 'customer favorite';
        }

        if (empty($reasons)) {
            return 'A great pick from Washoku.';
        }

        return ucfirst(implode(', ', array_unique(array_slice($reasons, 0, 2))) . '.');
    }

    private function formatRecommendation(MenuItem $item, string $reason): array
    {
        $image = $item->image_url
            ?? ($item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/200x200/f3f4f6/9ca3af?text=' . urlencode($item->name));

        $categorySlug = $item->category?->slug ?? 'menu';

        return [
            'id' => $item->id,
            'name' => $item->name,
            'description' => $item->description,
            'price' => (float) $item->price,
            'calories' => $item->calories,
            'image' => $image,
            'category' => $item->category?->name,
            'category_slug' => $categorySlug,
            'reason' => $reason,
            'menu_url' => route('menu.category', $categorySlug) . '?item=' . urlencode($item->name),
            'is_bestseller' => (bool) $item->is_bestseller,
        ];
    }

    private function buildResponseMessage(array $preferences, array $recommendations, bool $fromFreeText): string
    {
        if (empty($recommendations)) {
            $hints = [];
            if ($preferences['category'] !== 'any') {
                $hints[] = Str::headline(str_replace('-', ' ', $preferences['category']));
            }
            if ($preferences['budget_max'] !== null) {
                $hints[] = 'under ₱' . $preferences['budget_max'];
            }
            if ($preferences['dietary'] !== 'any') {
                $hints[] = $preferences['dietary'];
            }
            if ($preferences['portion'] === 'hearty') {
                $hints[] = 'hearty/filling';
            }
            if ($preferences['calorie_max'] !== null) {
                $hints[] = 'under ' . $preferences['calorie_max'] . ' kcal';
            }

            if (! empty($hints)) {
                return "I couldn't find dishes matching " . implode(', ', $hints) . ". Try a higher budget or a different category.";
            }

            return 'I could not find a match. Try asking for a dish like "tonkotsu ramen", "heavy bento", or "vegetarian under 300".';
        }

        $count = count($recommendations);

        $sortMode = $preferences['sort_mode'] ?? null;
        if ($sortMode === 'cheapest') {
            return "Here are {$count} more affordable options from our menu:";
        }
        if ($sortMode === 'lowest_cal') {
            return "Here are {$count} lighter, lower-calorie options from our menu:";
        }
        if ($sortMode === 'cheapest_cal') {
            return "Here are {$count} lighter and more affordable options from our menu:";
        }

        if ($preferences['calorie_max'] !== null) {
            return "Here are {$count} low-calorie options (under {$preferences['calorie_max']} kcal) from our menu:";
        }

        if ($preferences['portion'] === 'hearty') {
            return "Here are {$count} filling, hearty meals for you:";
        }

        if (! empty($preferences['dish_tokens']) || ! empty($preferences['ingredient_tokens'])) {
            return "Here's what I found on our menu:";
        }

        if ($fromFreeText) {
            return "Based on your request, here " . ($count === 1 ? 'is' : 'are') . " {$count} " . ($count === 1 ? 'dish' : 'dishes') . " from our menu:";
        }

        $parts = [];
        if ($preferences['category'] !== 'any') {
            $parts[] = Str::headline(str_replace('-', ' ', $preferences['category']));
        }
        if ($preferences['budget_max'] !== null) {
            $parts[] = 'under ₱' . $preferences['budget_max'];
        }

        if (empty($parts)) {
            return "Here are {$count} picks from our menu:";
        }

        return 'Here are ' . $count . ' ' . implode(', ', $parts) . ' recommendations from our menu:';
    }
}
