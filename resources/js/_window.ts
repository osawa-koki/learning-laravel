const _window = window as unknown as Window & {
  integerPrettify: (integer: number) => string
  floatPrettify: (integer: number) => string
}

export default _window
