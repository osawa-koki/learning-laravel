<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = [
            // 北海道
            [
                'id' => 1,
                'name' => '札幌ラーメン',
                'prefecture_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'ジンギスカン',
                'prefecture_id' => 1,
            ],
            [
                'id' => 3,
                'name' => '海鮮丼',
                'prefecture_id' => 1,
            ],
            // 青森県
            [
                'id' => 4,
                'name' => 'のっけ丼',
                'prefecture_id' => 2,
            ],
            [
                'id' => 5,
                'name' => 'りんご',
                'prefecture_id' => 2,
            ],
            [
                'id' => 6,
                'name' => '味噌カレー牛乳ラーメン',
                'prefecture_id' => 2,
            ],
            // 岩手県
            [
                'id' => 7,
                'name' => 'わんこそば',
                'prefecture_id' => 3,
            ],
            [
                'id' => 8,
                'name' => '盛岡冷麺',
                'prefecture_id' => 3,
            ],
            // 宮城県
            [
                'id' => 9,
                'name' => '牛タン',
                'prefecture_id' => 4,
            ],
            [
                'id' => 10,
                'name' => 'ずんだ餅',
                'prefecture_id' => 4,
            ],
            [
                'id' => 11,
                'name' => 'ひもの',
                'prefecture_id' => 4,
            ],
            // 秋田県
            [
                'id' => 12,
                'name' => 'きりたんぽ',
                'prefecture_id' => 5,
            ],
            [
                'id' => 13,
                'name' => '稲庭うどん',
                'prefecture_id' => 5,
            ],
            [
                'id' => 14,
                'name' => 'なまはげ鍋',
                'prefecture_id' => 5,
            ],
            // 山形県
            [
                'id' => 15,
                'name' => '天童もち',
                'prefecture_id' => 6,
            ],
            [
                'id' => 16,
                'name' => '山形牛',
                'prefecture_id' => 6,
            ],
            [
                'id' => 17,
                'name' => 'だだちゃ豆',
                'prefecture_id' => 6,
            ],
            // 福島県
            [
                'id' => 18,
                'name' => '会津蕎麦',
                'prefecture_id' => 7,
            ],
            [
                'id' => 19,
                'name' => '桃',
                'prefecture_id' => 7,
            ],
            [
                'id' => 20,
                'name' => '郡山ラーメン',
                'prefecture_id' => 7,
            ],
            // 茨城県
            [
                'id' => 21,
                'name' => '水戸うまいもん',
                'prefecture_id' => 8,
            ],
            [
                'id' => 22,
                'name' => '水戸納豆',
                'prefecture_id' => 8,
            ],
            // 栃木県
            [
                'id' => 23,
                'name' => 'とちおとめ',
                'prefecture_id' => 9,
            ],
            [
                'id' => 24,
                'name' => '餃子',
                'prefecture_id' => 9,
            ],
            // 群馬県
            [
                'id' => 25,
                'name' => 'おでん',
                'prefecture_id' => 10,
            ],
            [
                'id' => 26,
                'name' => '焼きまんじゅう',
                'prefecture_id' => 10,
            ],
            [
                'id' => 27,
                'name' => 'おやき',
                'prefecture_id' => 10,
            ],
            // 埼玉県
            [
                'id' => 28,
                'name' => '草加せんべい',
                'prefecture_id' => 11,
            ],
            [
                'id' => 29,
                'name' => '川越おでん',
                'prefecture_id' => 11,
            ],
            [
                'id' => 30,
                'name' => '浦和ビーフ',
                'prefecture_id' => 11,
            ],
            // 千葉県
            [
                'id' => 31,
                'name' => '銚子丼',
                'prefecture_id' => 12,
            ],
            [
                'id' => 32,
                'name' => '鴨川シーフード',
                'prefecture_id' => 12,
            ],
            [
                'id' => 33,
                'name' => '松戸天ぷら',
                'prefecture_id' => 12,
            ],
            // 東京都
            [
                'id' => 34,
                'name' => 'もんじゃ焼き',
                'prefecture_id' => 13,
            ],
            [
                'id' => 35,
                'name' => 'お好み焼き',
                'prefecture_id' => 13,
            ],
            [
                'id' => 36,
                'name' => '天ぷら',
                'prefecture_id' => 13,
            ],
            // 神奈川県
            [
                'id' => 37,
                'name' => '横浜ラーメン',
                'prefecture_id' => 14,
            ],
            [
                'id' => 38,
                'name' => '横浜カレー',
                'prefecture_id' => 14,
            ],
            // 新潟県
            [
                'id' => 39,
                'name' => 'へぎそば',
                'prefecture_id' => 15,
            ],
            [
                'id' => 40,
                'name' => '佐渡金山寿司',
                'prefecture_id' => 15,
            ],
            [
                'id' => 41,
                'name' => '魚沼産コシヒカリ',
                'prefecture_id' => 15,
            ],
            // 富山県
            [
                'id' => 42,
                'name' => '白えび',
                'prefecture_id' => 16,
            ],
            [
                'id' => 43,
                'name' => '富山ブラック',
                'prefecture_id' => 16,
            ],
            [
                'id' => 44,
                'name' => '富山ブラックラーメン',
                'prefecture_id' => 16,
            ],
            // 石川県
            [
                'id' => 45,
                'name' => '加賀野菜',
                'prefecture_id' => 17,
            ],
            [
                'id' => 46,
                'name' => '加賀の山菜',
                'prefecture_id' => 17,
            ],
            [
                'id' => 47,
                'name' => '加賀のお茶',
                'prefecture_id' => 17,
            ],
            // 福井県
            [
                'id' => 48,
                'name' => '越前おろしそば',
                'prefecture_id' => 18,
            ],
            [
                'id' => 49,
                'name' => '越前カニ',
                'prefecture_id' => 18,
            ],
            [
                'id' => 50,
                'name' => '越前焼きそば',
                'prefecture_id' => 18,
            ],
            // 山梨県
            [
                'id' => 51,
                'name' => 'ほうとう',
                'prefecture_id' => 19,
            ],
            [
                'id' => 52,
                'name' => '富士山の天然水',
                'prefecture_id' => 19,
            ],
            [
                'id' => 53,
                'name' => '富士山の天然氷',
                'prefecture_id' => 19,
            ],
            // 長野県
            [
                'id' => 54,
                'name' => '信州そば',
                'prefecture_id' => 20,
            ],
            [
                'id' => 55,
                'name' => '信州味噌',
                'prefecture_id' => 20,
            ],
            [
                'id' => 56,
                'name' => '信州リンゴ',
                'prefecture_id' => 20,
            ],
            // 岐阜県
            [
                'id' => 57,
                'name' => '鯉料理',
                'prefecture_id' => 21,
            ],
            [
                'id' => 58,
                'name' => '岐阜味噌',
                'prefecture_id' => 21,
            ],
            [
                'id' => 59,
                'name' => '岐阜の酒',
                'prefecture_id' => 21,
            ],
            // 静岡県
            [
                'id' => 60,
                'name' => '駿河湾の桜えび',
                'prefecture_id' => 22,
            ],
            [
                'id' => 61,
                'name' => '駿河湾のまぐろ',
                'prefecture_id' => 22,
            ],
            [
                'id' => 62,
                'name' => '駿河湾のあわび',
                'prefecture_id' => 22,
            ],
            // 愛知県
            [
                'id' => 63,
                'name' => '味噌カツ',
                'prefecture_id' => 23,
            ],
            [
                'id' => 64,
                'name' => '味噌煮込みうどん',
                'prefecture_id' => 23,
            ],
            [
                'id' => 65,
                'name' => '味噌煮込みうどん',
                'prefecture_id' => 23,
            ],
            // 三重県
            [
                'id' => 66,
                'name' => '伊勢うどん',
                'prefecture_id' => 24,
            ],
            [
                'id' => 67,
                'name' => '伊勢海老',
                'prefecture_id' => 24,
            ],
            [
                'id' => 68,
                'name' => '伊勢茶',
                'prefecture_id' => 24,
            ],
            // 滋賀県
            [
                'id' => 69,
                'name' => '近江牛',
                'prefecture_id' => 25,
            ],
            [
                'id' => 70,
                'name' => '近江の干し芋',
                'prefecture_id' => 25,
            ],
            [
                'id' => 71,
                'name' => '近江の鮒寿司',
                'prefecture_id' => 25,
            ],
            // 京都府
            [
                'id' => 72,
                'name' => '京野菜',
                'prefecture_id' => 26,
            ],
            [
                'id' => 73,
                'name' => '京漬物',
                'prefecture_id' => 26,
            ],
            [
                'id' => 74,
                'name' => '京都のお茶',
                'prefecture_id' => 26,
            ],
            // 大阪府
            [
                'id' => 75,
                'name' => '大阪王将の餃子',
                'prefecture_id' => 27,
            ],
            [
                'id' => 76,
                'name' => 'お好み焼き',
                'prefecture_id' => 27,
            ],
            [
                'id' => 77,
                'name' => 'たこ焼き',
                'prefecture_id' => 27,
            ],
            // 兵庫県
            [
                'id' => 78,
                'name' => '神戸牛',
                'prefecture_id' => 28,
            ],
            [
                'id' => 79,
                'name' => '神戸の魚',
                'prefecture_id' => 28,
            ],
            // 奈良県
            [
                'id' => 80,
                'name' => '奈良漬け',
                'prefecture_id' => 29,
            ],
            [
                'id' => 81,
                'name' => '奈良の鹿',
                'prefecture_id' => 29,
            ],
            [
                'id' => 82,
                'name' => '奈良のお茶',
                'prefecture_id' => 29,
            ],
            // 和歌山県
            [
                'id' => 83,
                'name' => '梅干し',
                'prefecture_id' => 30,
            ],
            [
                'id' => 84,
                'name' => '梅酒',
                'prefecture_id' => 30,
            ],
            [
                'id' => 85,
                'name' => '梅の葉茶',
                'prefecture_id' => 30,
            ],
            // 鳥取県
            [
                'id' => 86,
                'name' => '松葉ガニ',
                'prefecture_id' => 31,
            ],
            [
                'id' => 87,
                'name' => '鳥取和牛',
                'prefecture_id' => 31,
            ],
            [
                'id' => 88,
                'name' => '鳥取の柿',
                'prefecture_id' => 31,
            ],
            // 島根県
            [
                'id' => 89,
                'name' => '出雲そば',
                'prefecture_id' => 32,
            ],
            // 岡山県
            [
                'id' => 90,
                'name' => '岡山の桃',
                'prefecture_id' => 33,
            ],
            // 広島県
            [
                'id' => 91,
                'name' => '広島の牡蠣',
                'prefecture_id' => 34,
            ],
            [
                'id' => 92,
                'name' => '広島のレモン',
                'prefecture_id' => 34,
            ],
            [
                'id' => 93,
                'name' => '広島のもみじ饅頭',
                'prefecture_id' => 34,
            ],
            // 山口県
            [
                'id' => 94,
                'name' => '山口のぶどう',
                'prefecture_id' => 35,
            ],
            [
                'id' => 95,
                'name' => '山口の柿',
                'prefecture_id' => 35,
            ],
            [
                'id' => 96,
                'name' => '山口のり',
                'prefecture_id' => 35,
            ],
            // 徳島県
            [
                'id' => 97,
                'name' => '阿波尾鶏',
                'prefecture_id' => 36,
            ],
            [
                'id' => 98,
                'name' => '徳島ラーメン',
                'prefecture_id' => 36,
            ],
            [
                'id' => 99,
                'name' => '徳島の柿',
                'prefecture_id' => 36,
            ],
            // 香川県
            [
                'id' => 100,
                'name' => '讃岐うどん',
                'prefecture_id' => 37,
            ],
            [
                'id' => 101,
                'name' => '讃岐の柿',
                'prefecture_id' => 37,
            ],
            [
                'id' => 102,
                'name' => '讃岐の柑橘',
                'prefecture_id' => 37,
            ],
            // 愛媛県
            [
                'id' => 103,
                'name' => '伊予柑',
                'prefecture_id' => 38,
            ],
            [
                'id' => 104,
                'name' => '愛媛牛',
                'prefecture_id' => 38,
            ],
            [
                'id' => 105,
                'name' => '愛媛の柿',
                'prefecture_id' => 38,
            ],
            // 高知県
            [
                'id' => 106,
                'name' => '高知のかつお',
                'prefecture_id' => 39,
            ],
            [
                'id' => 107,
                'name' => '高知のゆず',
                'prefecture_id' => 39,
            ],
            [
                'id' => 108,
                'name' => '高知の柑橘',
                'prefecture_id' => 39,
            ],
            // 福岡県
            [
                'id' => 109,
                'name' => '博多ラーメン',
                'prefecture_id' => 40,
            ],
            [
                'id' => 110,
                'name' => '明太子',
                'prefecture_id' => 40,
            ],
            [
                'id' => 111,
                'name' => 'ひよこ豆',
                'prefecture_id' => 40,
            ],
            // 佐賀県
            [
                'id' => 112,
                'name' => '佐賀牛',
                'prefecture_id' => 41,
            ],
            [
                'id' => 113,
                'name' => '佐賀の柿',
                'prefecture_id' => 41,
            ],
            [
                'id' => 114,
                'name' => '佐賀の梅',
                'prefecture_id' => 41,
            ],
            // 長崎県
            [
                'id' => 115,
                'name' => '長崎和牛',
                'prefecture_id' => 42,
            ],
            [
                'id' => 116,
                'name' => '長崎のカステラ',
                'prefecture_id' => 42,
            ],
            [
                'id' => 117,
                'name' => '長崎の柑橘',
                'prefecture_id' => 42,
            ],
            // 熊本県
            [
                'id' => 118,
                'name' => '熊本ラーメン',
                'prefecture_id' => 43,
            ],
            [
                'id' => 119,
                'name' => '熊本の馬刺し',
                'prefecture_id' => 43,
            ],
            [
                'id' => 120,
                'name' => '熊本の柑橘',
                'prefecture_id' => 43,
            ],
            // 大分県
            [
                'id' => 121,
                'name' => '大分ラーメン',
                'prefecture_id' => 44,
            ],
            [
                'id' => 122,
                'name' => '大分の柑橘',
                'prefecture_id' => 44,
            ],
            [
                'id' => 123,
                'name' => '大分の柿',
                'prefecture_id' => 44,
            ],
            // 宮崎県
            [
                'id' => 124,
                'name' => '宮崎牛',
                'prefecture_id' => 45,
            ],
            [
                'id' => 125,
                'name' => '宮崎の柑橘',
                'prefecture_id' => 45,
            ],
            [
                'id' => 126,
                'name' => '宮崎のマンゴー',
                'prefecture_id' => 45,
            ],
            // 鹿児島県
            [
                'id' => 127,
                'name' => '鹿児島黒豚',
                'prefecture_id' => 46,
            ],
            [
                'id' => 128,
                'name' => '鹿児島の柑橘',
                'prefecture_id' => 46,
            ],
            [
                'id' => 129,
                'name' => '鹿児島のさつまいも',
                'prefecture_id' => 46,
            ],
            // 沖縄県
            [
                'id' => 130,
                'name' => '沖縄そば',
                'prefecture_id' => 47,
            ],
            [
                'id' => 131,
                'name' => '沖縄の柑橘',
                'prefecture_id' => 47,
            ],
            [
                'id' => 132,
                'name' => '沖縄のパイナップル',
                'prefecture_id' => 47,
            ],
            [
                'id' => 133,
                'name' => 'ちんすこう',
                'prefecture_id' => 47,
            ],
        ];

        foreach ($foods as $food) {
            \App\Models\Food::updateOrCreate(['id' => $food['id']], $food);
        }
    }
}
