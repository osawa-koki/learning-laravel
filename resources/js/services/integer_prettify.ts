import _window from '../_window'

function integerPrettify (integer: number): string {
  const str = integer.toString()
  let result = ''
  let counter = 0
  for (let i = str.length - 1; i >= 0; i--) {
    result = str[i] + result
    counter++
    if (counter % 3 === 0 && i !== 0) {
      result = ',' + result
    }
  }
  return result
}

_window.integerPrettify = integerPrettify
