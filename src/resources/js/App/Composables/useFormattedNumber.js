import { computed, isRef } from 'vue';

const DEFAULT_OPTIONS = {
  thousandsSeparator: ' ',
  maxDecimalPlaces: 2,
};

/**
 * Оставить только цифры и не более одной точки (для десятичной части).
 * @param {string|number|null|undefined} value
 * @param {number} [maxDecimalPlaces=2]
 * @returns {string}
 */
export function parseFormattedNumber(value, maxDecimalPlaces = 2) {
  if (value == null || value === '') return '';
  const s = String(value).replace(/\s/g, '');
  const parts = s.split('.');
  const intPart = (parts[0] ?? '').replace(/\D/g, '');
  const decPart = (parts[1] ?? '').replace(/\D/g, '').slice(0, maxDecimalPlaces);
  if (decPart === '') return intPart || '';
  return `${intPart || '0'}.${decPart}`;
}

/**
 * Форматирование числа с разделителем тысяч (например 6 000 000.00).
 * @param {string|number|null|undefined} value
 * @param {Object} [options]
 * @param {string} [options.thousandsSeparator=' ']
 * @returns {string}
 */
export function formatNumberDisplay(value, options = {}) {
  const { thousandsSeparator = ' ' } = { ...DEFAULT_OPTIONS, ...options };
  const maxDecimalPlaces = options.maxDecimalPlaces ?? DEFAULT_OPTIONS.maxDecimalPlaces;
  const raw = parseFormattedNumber(value, maxDecimalPlaces);
  if (raw === '') return '';
  const [intPart, decPart] = raw.split('.');
  const formatted = intPart.replace(/\B(?=(\d{3})+(?!\d))/g, thousandsSeparator);
  return decPart !== undefined ? `${formatted}.${decPart}` : formatted;
}

/**
 * Композабл для поля ввода с форматированием (разделитель тысяч при отображении).
 * В модели хранится «сырое» значение (только цифры и точка), в инпуте — отформатированное.
 *
 * @param {Ref|{ get: () => string|number, set: (v: string) => void }} source — ref с сырым значением или объект { get, set }
 * @param {Object} [options]
 * @param {string} [options.thousandsSeparator=' ']
 * @param {number} [options.maxDecimalPlaces=2]
 * @returns {ComputedRef<string>} вычисляемое свойство для v-model (чтение — формат, запись — парсинг в source)
 *
 * @example
 * // с reactive form
 * const priceDisplay = useFormattedNumber(
 *   { get: () => form.price, set: (v) => form.price = v }
 * );
 * <el-input v-model="priceDisplay" />
 *
 * @example
 * // с ref
 * const priceRaw = ref('');
 * const priceDisplay = useFormattedNumber(priceRaw);
 * <el-input v-model="priceDisplay" />
 */
export function useFormattedNumber(source, options = {}) {
  const opts = { ...DEFAULT_OPTIONS, ...options };

  const get = () => (isRef(source) ? source.value : source.get());
  const set = (v) => {
    const raw = parseFormattedNumber(v, opts.maxDecimalPlaces);
    if (isRef(source)) {
      source.value = raw;
    } else {
      source.set(raw);
    }
  };

  return computed({
    get: () => formatNumberDisplay(get(), opts),
    set,
  });
}
