import { mount } from '@vue/test-utils'
import FlagApp from './FlagApp.vue'

test('Main page displays title', () => {
  const wrapper = mount(FlagApp, {})

  // Assert the rendered text of the component
  expect(wrapper.text()).toContain('Flags App')
})

test('Main page displays spinner', () => {
  const wrapper = mount(FlagApp, {})

  expect(wrapper.findAll('[data-test="loading-spinner"')).toHaveLength(1)
})