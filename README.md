## Typography

This theme primarily uses the beta version of David Jonathan Ross's Gimlet Variable, a variable font with support for (narrower) widths, optical sizes from micro to display, and weights from 300 to 900.

Variable font axes are set by either the appropriate CSS property (`font-weight`) or by using the `font-variation-settings` property.

Optical sizes should scale with the font size, and so it should not be necessary to set the `opsz` axis. The one exception to this may be to push large or micro type a little bit toward the extremes.

Caption/micro type can be made a little more micro-y with

```css
// This will yield 12px type optically sized as if it's 8px
font-size: calc(1rem * (12/16)); // 12 px in rems
font-variation-settings: 'opsz' 8;
```

In general, a lower `opsz` will make type chunkier and more broadly spaced, a higher `opsz` will make spacing and letter forms tighter and smoother.