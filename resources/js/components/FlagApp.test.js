import { flushPromises, mount, shallowMount } from '@vue/test-utils'
import FlagApp from './FlagApp.vue'
import axios from 'axios'

test('Main page displays title', () => {
  const wrapper = shallowMount(FlagApp, {})

  // Assert the rendered text of the component
  expect(wrapper.text()).toContain('Flags App')
})

test('Main page displays spinner', () => {
  const wrapper = mount(FlagApp, {})

  expect(wrapper.findAll('[data-test="loading-spinner"')).toHaveLength(1)
})

test('Main page displays flags', async () => {
  const mockFlagList = {data: [1,2,3,4,5]}
  jest.spyOn(axios, 'get').mockResolvedValue(mockFlagList)

  const wrapper = mount(FlagApp, {})

  expect(axios.get).toHaveBeenCalledTimes(1)
  expect(axios.get).toHaveBeenCalledWith('/api/flags')

  // Wait until the DOM updates.
  await flushPromises()

  expect(wrapper.findAll('[data-test="flag-item"')).toHaveLength(5)
})