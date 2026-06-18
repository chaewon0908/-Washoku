<!-- Food Advisor Chat Widget -->
<div
    x-data="foodAdvisor()"
    x-cloak
    class="food-advisor-root"
    @keydown.escape.window="open && close()"
>
    <!-- Chat Panel -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-95"
        class="food-advisor-panel"
        role="dialog"
        aria-label="Food advisor chat"
    >
        <!-- Header -->
        <div class="food-advisor-header">
            <div class="flex items-center gap-3">
                <div class="food-advisor-avatar">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div>
                    <p class="text-white font-bold text-sm leading-tight">Washoku Food Advisor</p>
                    <p class="text-red-100 text-xs">Menu help & recommendations</p>
                </div>
            </div>
            <button @click="close()" class="text-white/80 hover:text-white transition-colors p-1" aria-label="Close chat">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Messages -->
        <div class="food-advisor-messages" x-ref="messages">
            <template x-for="(msg, index) in messages" :key="index">
                <div :class="msg.role === 'bot' ? 'flex justify-start' : 'flex justify-end'">
                    <div
                        :class="msg.role === 'bot'
                            ? 'food-advisor-bubble-bot'
                            : 'food-advisor-bubble-user'"
                    >
                        <p class="text-sm leading-relaxed whitespace-pre-line" x-text="msg.text"></p>

                        <!-- Recommendation cards -->
                        <template x-if="msg.recommendations && msg.recommendations.length">
                            <div class="mt-3 space-y-2">
                                <template x-for="item in msg.recommendations" :key="item.id">
                                    <div class="food-advisor-card">
                                        <img :src="item.image" :alt="item.name" class="food-advisor-card-image">
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-start justify-between gap-2">
                                                <p class="font-bold text-gray-800 text-sm leading-tight" x-text="item.name"></p>
                                                <span class="text-red-600 font-bold text-sm shrink-0" x-text="'₱' + Math.round(item.price)"></span>
                                            </div>
                                            <p class="text-xs text-amber-700 font-medium mt-0.5" x-show="item.calories" x-text="item.calories ? item.calories + ' kcal' : ''"></p>
                                            <p class="text-xs text-gray-500 mt-1 line-clamp-2" x-text="item.reason"></p>
                                            <div class="flex gap-2 mt-2">
                                                <button
                                                    @click="addToCart(item)"
                                                    class="food-advisor-btn-primary"
                                                >
                                                    Add to cart
                                                </button>
                                                <a
                                                    :href="item.menu_url"
                                                    class="food-advisor-btn-secondary"
                                                >
                                                    View
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>
                </div>
            </template>

            <!-- Typing indicator -->
            <div x-show="loading" class="flex justify-start">
                <div class="food-advisor-bubble-bot">
                    <div class="flex gap-1.5 py-1">
                        <span class="food-advisor-dot"></span>
                        <span class="food-advisor-dot animation-delay-150"></span>
                        <span class="food-advisor-dot animation-delay-300"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick replies -->
        <div x-show="quickReplies.length > 0 && !loading" class="food-advisor-quick-replies">
            <template x-for="reply in quickReplies" :key="reply.value">
                <button
                    @click="handleQuickReply(reply)"
                    class="food-advisor-chip"
                    x-text="reply.label"
                ></button>
            </template>
        </div>

        <!-- Input -->
        <div class="food-advisor-input-bar">
            <input
                type="text"
                x-model="input"
                @keydown.enter.prevent="sendMessage()"
                :placeholder="inputPlaceholder"
                :disabled="loading"
                class="food-advisor-input"
            >
            <button
                @click="sendMessage()"
                :disabled="loading || !input.trim()"
                class="food-advisor-send"
                aria-label="Send message"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Toggle Button -->
    <button
        @click="toggle()"
        class="food-advisor-toggle"
        :class="{ 'food-advisor-toggle-active': open }"
        aria-label="Open food advisor"
    >
        <svg x-show="!open" class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
        </svg>
        <svg x-show="open" class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
        <span x-show="!open" class="food-advisor-badge">Ask me!</span>
    </button>
</div>

<script>
function foodAdvisor() {
    return {
        open: false,
        loading: false,
        input: '',
        step: 'welcome',
        preferences: {
            category: 'any',
            budget_max: null,
            budget_strict: false,
            calorie_max: null,
            dietary: 'any',
            spice: 'any',
            portion: 'any',
            exclude_ids: [],
        },
        messages: [],
        quickReplies: [],
        lastShownIds: [],

        get inputPlaceholder() {
            if (this.step === 'results') {
                return 'Try "spicy ramen under 400"...';
            }
            return 'Or type your preference here...';
        },

        toggle() {
            this.open = !this.open;
            if (this.open && this.messages.length === 0) {
                this.startConversation();
            }
            this.$nextTick(() => this.scrollToBottom());
        },

        close() {
            this.open = false;
        },

        startConversation() {
            this.step = 'welcome';
            this.preferences = {
                category: 'any',
                budget_max: null,
                budget_strict: false,
                calorie_max: null,
                dietary: 'any',
                spice: 'any',
                portion: 'any',
                exclude_ids: [],
            };
            this.lastShownIds = [];
            this.addBotMessage("Hi! I'm your Washoku Food Advisor. I help you pick food and answer questions about hours, delivery, payment, and more.\n\nTell me what you're craving — you can also follow up (e.g. \"something cheaper\" or \"lower calorie\").");
            this.setQuickReplies([
                { label: '🍣 Sushi', value: 'category:sushi' },
                { label: '🍜 Ramen', value: 'category:ramen' },
                { label: '🍱 Bento', value: 'category:bento-boxes' },
                { label: '🍤 Tempura', value: 'category:tempura' },
                { label: '🍡 Dessert', value: 'category:desserts' },
                { label: '🥤 Drinks', value: 'category:drinks' },
                { label: '✨ Surprise me', value: 'category:any' },
            ]);
        },

        setQuickReplies(replies) {
            this.quickReplies = replies;
        },

        addBotMessage(text, recommendations = null) {
            this.messages.push({ role: 'bot', text, recommendations });
            this.$nextTick(() => this.scrollToBottom());
        },

        addUserMessage(text) {
            this.messages.push({ role: 'user', text });
            this.$nextTick(() => this.scrollToBottom());
        },

        handleQuickReply(reply) {
            const [type, value] = reply.value.split(':');

            if (type === 'restart') {
                this.addUserMessage(reply.label);
                this.quickReplies = [];
                this.messages = [];
                this.startConversation();
                return;
            }

            if (type === 'faq') {
                const faqMessages = {
                    hours: 'What are your operating hours?',
                    delivery: 'Do you offer delivery?',
                    payment: 'What payment methods do you accept?',
                };
                if (faqMessages[value]) {
                    this.quickReplies = [];
                    this.sendMessage(faqMessages[value]);
                    return;
                }
            }

            if (type === 'followup') {
                this.addUserMessage(reply.label);
                this.quickReplies = [];
                const actionMap = {
                    else: 'rotate',
                    cheaper: 'refine_cheaper',
                    lowcal: 'refine_lowcal',
                    both: 'refine_both',
                };
                if (actionMap[value]) {
                    this.fetchRecommendations(null, actionMap[value]);
                }
                return;
            }

            this.addUserMessage(reply.label);
            this.quickReplies = [];

            if (type === 'category') {
                this.preferences.category = value;
                this.step = 'budget';
                this.addBotMessage('Got it! What\'s your budget per dish?');
                this.setQuickReplies([
                    { label: 'Under ₱200', value: 'budget:200' },
                    { label: '₱200 – ₱350', value: 'budget:350' },
                    { label: '₱350 – ₱500', value: 'budget:500' },
                    { label: 'Any budget', value: 'budget:any' },
                ]);
            } else if (type === 'budget') {
                this.preferences.budget_max = value === 'any' ? null : parseInt(value, 10);
                this.preferences.budget_strict = value !== 'any';

                if (this.step === 'results') {
                    this.fetchRecommendations();
                    return;
                }

                if (this.skipsDietaryAndSpice()) {
                    this.preferences.dietary = 'any';
                    this.preferences.spice = 'any';
                    this.fetchRecommendations();
                    return;
                }

                this.step = 'dietary';
                this.addBotMessage('Any dietary preferences?');
                this.setQuickReplies(this.dietaryOptionsForCategory());
            } else if (type === 'dietary') {
                this.preferences.dietary = value;

                if (this.skipsSpice()) {
                    this.preferences.spice = 'any';
                    this.fetchRecommendations();
                    return;
                }

                this.step = 'spice';
                this.addBotMessage('How about spice level?');
                this.setQuickReplies([
                    { label: 'No preference', value: 'spice:any' },
                    { label: '🌶️ Spicy please', value: 'spice:spicy' },
                    { label: '😌 Mild only', value: 'spice:mild' },
                ]);
            } else if (type === 'spice') {
                this.preferences.spice = value;
                this.fetchRecommendations();
            }
        },

        async sendMessage(textOverride = null) {
            const text = (textOverride || this.input).trim();
            if (!text || this.loading) return;

            if (!textOverride) {
                this.addUserMessage(text);
                this.input = '';
            } else {
                this.addUserMessage(text);
            }
            this.quickReplies = [];

            await this.fetchRecommendations(text);
        },

        async fetchRecommendations(message = null, action = null) {
            this.loading = true;
            this.step = 'results';

            if (action === 'rotate' && this.lastShownIds.length > 0) {
                this.preferences.exclude_ids = [...new Set([...(this.preferences.exclude_ids || []), ...this.lastShownIds])].slice(-16);
            }

            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

                const payload = {
                    preferences: this.preferences,
                    message: message || null,
                    action: action || null,
                };

                const response = await fetch('/api/food-advisor/recommend', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify(payload),
                });

                if (!response.ok) {
                    throw new Error('Request failed');
                }

                const data = await response.json();

                if (data.preferences) {
                    this.preferences = data.preferences;
                }

                if (data.recommendations && data.recommendations.length > 0) {
                    this.lastShownIds = data.recommendations.map(item => item.id);
                }

                this.addBotMessage(data.message, data.recommendations);

                if (data.type === 'answer') {
                    this.setQuickReplies([
                        { label: '🍜 Recommend food', value: 'restart:1' },
                        { label: '📋 Menu hours', value: 'faq:hours' },
                        { label: '🚚 Delivery', value: 'faq:delivery' },
                        { label: '💳 Payment', value: 'faq:payment' },
                    ]);
                } else if (data.recommendations && data.recommendations.length > 0) {
                    this.setQuickReplies(this.buildFollowUpReplies());
                } else {
                    this.setQuickReplies(this.buildEmptyReplies());
                }
            } catch (e) {
                this.addBotMessage("Sorry, I had trouble finding recommendations. Please try again or browse our menu.");
                this.setQuickReplies([
                    { label: '🔄 Start over', value: 'restart:1' },
                ]);
            } finally {
                this.loading = false;
            }
        },

        addToCart(item) {
            if (window.Alpine && window.Alpine.store('cart')) {
                window.Alpine.store('cart').addToCart(
                    item.id,
                    item.name,
                    item.price,
                    item.image
                );
            }
        },

        scrollToBottom() {
            const el = this.$refs.messages;
            if (el) {
                el.scrollTop = el.scrollHeight;
            }
        },

        skipsDietaryAndSpice() {
            return ['drinks', 'desserts'].includes(this.preferences.category);
        },

        skipsSpice() {
            return ['drinks', 'desserts'].includes(this.preferences.category);
        },

        dietaryOptionsForCategory() {
            const cat = this.preferences.category;
            const options = [{ label: 'No restrictions', value: 'dietary:any' }];

            if (['drinks', 'desserts'].includes(cat)) {
                return options;
            }

            options.push({ label: '🥬 Vegetarian', value: 'dietary:vegetarian' });

            if (!['desserts'].includes(cat)) {
                options.push({ label: '🐟 Seafood', value: 'dietary:seafood' });
                options.push({ label: '🥩 Meat lover', value: 'dietary:meat' });
            }

            return options;
        },

        buildFollowUpReplies() {
            const cat = this.preferences.category;
            const replies = [
                { label: '🔄 Something else', value: 'followup:else' },
                { label: '💰 Lower price', value: 'followup:cheaper' },
            ];

            if (cat !== 'drinks') {
                replies.push({ label: '🥗 Lower calories', value: 'followup:lowcal' });
            }

            if (cat !== 'drinks' && (this.preferences.budget_max || this.preferences.calorie_max)) {
                replies.push({ label: '💰🥗 Cheaper & lighter', value: 'followup:both' });
            }

            replies.push({ label: '🔄 Start over', value: 'restart:1' });

            return replies;
        },

        buildEmptyReplies() {
            const cat = this.preferences.category;
            const replies = [{ label: '🔄 Start over', value: 'restart:1' }];

            if (cat === 'drinks') {
                replies.push({ label: '🥤 More drinks', value: 'followup:else' });
            } else if (cat === 'desserts') {
                replies.push({ label: '🍡 More desserts', value: 'followup:else' });
            } else if (cat === 'ramen') {
                replies.push({ label: '🍜 Try other ramen', value: 'followup:else' });
            } else if (cat === 'sushi') {
                replies.push({ label: '🍣 Try other sushi', value: 'followup:else' });
            } else {
                replies.push({ label: '🔍 Try again', value: 'followup:else' });
            }

            if (this.preferences.budget_max) {
                replies.push({ label: '💰 Relax budget', value: 'budget:any' });
            }

            return replies;
        },
    };
}
</script>
