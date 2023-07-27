import _window from '../_window'

function floatPrettify (num: number): string {
  const str = num.toString()
  const [integer, float] = str.split('.')
  let result = ''
  let counter = 0
  for (let i = integer.length - 1; i >= 0; i--) {
    result = integer[i] + result
    counter++
    if (counter % 3 === 0 && i !== 0) {
      result = ',' + result
    }
  }
  if (float != null) {
    result += '.' + (float + '00').slice(0, 2)
  } else {
    result += '.00'
  }
  return result
}

_window.floatPrettify = floatPrettify
