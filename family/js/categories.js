/**
 * 予定の分類。色とあわせて、必ず文字でも区別する。
 * ここを増やすと、表示側の凡例とカードが一緒に追従する。
 */

export const CATEGORIES = {
  trash: {
    id: 'trash',
    label: 'ゴミ出し',
    color: '#2f6a4a',
    wash: '#e5f2ea',
    icon: 'trash',
  },
  hospital: {
    id: 'hospital',
    label: '病院・通院',
    color: '#9a4d3c',
    wash: '#f8ebe6',
    icon: 'hospital',
  },
  shopping: {
    id: 'shopping',
    label: '買い物',
    color: '#8a5a12',
    wash: '#f8f1dc',
    icon: 'shopping',
  },
  payment: {
    id: 'payment',
    label: '支払い',
    color: '#2c5278',
    wash: '#e7eef5',
    icon: 'payment',
  },
  other: {
    id: 'other',
    label: 'その他',
    color: '#5c564e',
    wash: '#f1ece4',
    icon: 'other',
  },
};

export const CATEGORY_LIST = [
  CATEGORIES.trash,
  CATEGORIES.hospital,
  CATEGORIES.shopping,
  CATEGORIES.payment,
  CATEGORIES.other,
];

export function categoryOf(id) {
  return CATEGORIES[id] || CATEGORIES.other;
}
