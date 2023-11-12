import { flushPromises, mount, shallowMount } from '@vue/test-utils'
import FlagApp from './FlagApp.vue'
import axios from 'axios'
import mockFlagListJson from '../mocks/mockFlagList.json'

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
  const mockFlagList = mockFlagListJson

  jest.spyOn(axios, 'get').mockResolvedValue(mockFlagList)

  const wrapper = mount(FlagApp, {})

  expect(axios.get).toHaveBeenCalledTimes(1)
  expect(axios.get).toHaveBeenCalledWith('/api/flag-list')

  // Wait until the DOM updates.
  await flushPromises()

  const flags = wrapper.findAll('[data-test="flag-item"]')

  expect(flags).toHaveLength(5)
  expect(flags[0].text()).toContain('Portugal')
})